<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ConcurrentRequestsTest extends Command
{
    protected $signature = 'test:concurrency 
                            {--requests=100 : Total number of requests} 
                            {--concurrency=10 : Number of concurrent requests} 
                            {--url=/test-concurrency : URL to test}';

    protected $description = 'Test system capacity with concurrent requests';

    public function handle()
    {
        $this->setupTestEnvironment();
        $this->runTest();
    }

    private function setupTestEnvironment()
    {
        // Create test route if not exists (add to routes/web.php)
        if (!app()->routesAreCached()) {
            require base_path('routes/web.php');
        }
    }

    private function runTest()
    {
        $url = $this->option('url');
        $totalRequests = $this->option('requests');
        $concurrency = $this->option('concurrency');

        // Start resource monitoring
        $monitorLog = $this->startMonitoring();

        // Run load test
        $results = $this->runLoadTest($url, $totalRequests, $concurrency);

        // Stop monitoring and get stats
        $resourceUsage = $this->stopMonitoring($monitorLog);

        // Display results
        $this->displayResults($results, $resourceUsage);
    }

    private function startMonitoring()
    {
        $logFile = storage_path('logs/monitor-'.time().'.log');
        $this->info("Starting resource monitoring...");

        $monitorProcess = new Process([
            'bash',
            '-c',
            "while true; do
                echo \"$(date +%s) $(top -bn1 | grep 'Cpu(s)' | sed 's/.*, *\\([0-9.]*\\)%* id.*/\\1/' | awk '{print 100 - \$1}') $(free -m | awk '/Mem:/ {print \$3}')\" >> $logFile;
                sleep 1;
            done"
        ]);
        $monitorProcess->start();

        return [
            'log_file' => $logFile,
            'process' => $monitorProcess
        ];
    }

    private function stopMonitoring($monitorLog)
    {
        $this->info("Stopping resource monitoring...");
        $monitorLog['process']->stop(0);
        usleep(500000); // Wait for process to terminate

        // Parse log file
        $logContents = file($monitorLog['log_file'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unlink($monitorLog['log_file']);

        $cpuUsages = [];
        $memUsages = [];

        foreach ($logContents as $line) {
            [$timestamp, $cpu, $mem] = explode(' ', $line);
            $cpuUsages[] = (float)$cpu;
            $memUsages[] = (float)$mem;
        }

        return [
            'max_cpu' => max($cpuUsages),
            'max_mem' => max($memUsages),
            'avg_cpu' => array_sum($cpuUsages) / count($cpuUsages),
            'avg_mem' => array_sum($memUsages) / count($memUsages)
        ];
    }

    private function runLoadTest($url, $totalRequests, $concurrency)
    {
        $this->info("Starting load test with $totalRequests requests ($concurrency concurrent)...");

        $processes = [];
        $success = 0;
        $failed = 0;
        $responseTimes = [];

        $startTime = microtime(true);

        for ($i = 0; $i < $concurrency; $i++) {
            $processes[$i] = $this->createCurlProcess($url);
        }

        $completed = 0;
        while ($completed < $totalRequests) {
            foreach ($processes as $key => $process) {
                if ($process instanceof Process && !$process->isRunning()) {
                    $status = $this->handleProcessResult($process, $startTime);
                    $status ? $success++ : $failed++;
                    $completed++;
                    $responseTimes[] = microtime(true) - $startTime;

                    if ($completed < $totalRequests) {
                        $processes[$key] = $this->createCurlProcess($url);
                    } else {
                        unset($processes[$key]);
                    }
                }
            }
            usleep(10000); // 10ms
        }

        $totalTime = microtime(true) - $startTime;

        return [
            'success' => $success,
            'failed' => $failed,
            'total_time' => $totalTime,
            'rps' => $totalRequests / $totalTime,
            'response_times' => $responseTimes
        ];
    }

    private function createCurlProcess($url)
    {
        return new Process([
            'curl',
            '-s',
            '-o', '/dev/null',
            '-w', '%{http_code}',
            '--max-time', '10',
            url($url)
        ]);
    }

    private function handleProcessResult($process, $startTime)
    {
        try {
            $process->mustRun();
            $statusCode = $process->getOutput();
            return $statusCode == 200;
        } catch (ProcessFailedException $e) {
            return false;
        }
    }

    private function displayResults($results, $resourceUsage)
    {
        $this->info("\nTest Results:");
        $this->table([], [
            ['Successful requests', $results['success']],
            ['Failed requests', $results['failed']],
            ['Total time', number_format($results['total_time'], 2).'s'],
            ['Requests/sec', number_format($results['rps'], 2)],
            ['Max CPU Usage', number_format($resourceUsage['max_cpu'], 2).'%'],
            ['Average CPU Usage', number_format($resourceUsage['avg_cpu'], 2).'%'],
            ['Max Memory Usage', number_format($resourceUsage['max_mem'], 2).'MB'],
            ['Average Memory Usage', number_format($resourceUsage['avg_mem'], 2).'MB']
        ]);
    }
}