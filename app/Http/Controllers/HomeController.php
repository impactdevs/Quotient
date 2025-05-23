<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Event;
use App\Models\Leave;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $tomorrow = Carbon::tomorrow();
        $hours = [];
        $todayCounts = [];
        $yesterdayCounts = [];
        $lateCounts = [];
        $allocatedLeaveDays = [];

        $employee = auth()->user()->employee; // Assuming you have a relationship set up

        // Check days until contract expiry for the logged-in employee
        $daysUntilExpiry = optional($employee)->daysUntilContractExpiry();

        $leaveTypes = LeaveType::all()->keyBy('leave_type_id');


        // Fetch leave requests where end date is greater than today
        $leaveRequests = Leave::where('end_date', '>', $today)->get();
        //number of employees
        $number_of_employees = Employee::count();
        $attendances = Attendance::whereDate('attendance_date', $today)->count();
        $available_leave = Leave::count();
        //count the number of clockins per hour
        $clockInCounts = DB::table('attendances')
            ->select(DB::raw('HOUR(clock_in) as hour'), DB::raw('count(*) as count'))
            ->whereDate('attendance_date', $today)
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();
        // Query to count clock-ins per hour for yesterday
        $yesterdayClockInCounts = DB::table('attendances')
            ->select(DB::raw('HOUR(clock_in) as hour'), DB::raw('count(*) as count'))
            ->whereDate('attendance_date', $yesterday)
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        // Query for late arrivals (e.g., after 9 AM)
        $lateArrivalCounts = DB::table('attendances')
            ->select(DB::raw('HOUR(clock_in) as hour'), DB::raw('count(*) as count'))
            ->whereDate('attendance_date', $today)
            ->where('clock_in', '>', Carbon::today()->setHour(9))
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();
        // Initialize counts for each hour (0-23)
        for ($i = 0; $i < 24; $i++) {
            $hours[] = Carbon::today()->setHour($i)->toISOString();
            $todayCounts[] = 0;
            $yesterdayCounts[] = 0;
            $lateCounts[] = 0;
        }

        // Populate today's counts
        foreach ($clockInCounts as $record) {
            $todayCounts[$record->hour] = $record->count;
        }

        // Populate yesterday's counts
        foreach ($yesterdayClockInCounts as $record) {
            $yesterdayCounts[$record->hour] = $record->count;
        }

        // Populate late arrival counts
        foreach ($lateArrivalCounts as $record) {
            $lateCounts[$record->hour] = $record->count;
        }

        // Assuming you already have $leaveRequests
        $allocatedLeaveDays = [];

        foreach ($leaveRequests as $leave) {
            $startDate = Carbon::parse($leave->start_date);
            $endDate = Carbon::parse($leave->end_date);
            $leaveTypeId = $leave->leave_type_id;

            $daysAllocated = $startDate->diffInDays($endDate) + 1;

            if (!isset($allocatedLeaveDays[$leaveTypeId])) {
                $allocatedLeaveDays[$leaveTypeId] = 0;
            }
            $allocatedLeaveDays[$leaveTypeId] += $daysAllocated;
        }

        // Prepare data for ECharts
        $chartData = [];
        foreach ($leaveTypes as $leaveType) {
            $chartData[] = $allocatedLeaveDays[$leaveType->leave_type_id] ?? 0;
        }

        // Convert to JSON for JavaScript
        $chartDataJson = json_encode($chartData);
        $leaveTypesJson = json_encode($leaveTypes->pluck('leave_type_name')->toArray());


        // Get the number of employees per department with department names
        $employeeCounts = DB::table('employees')
            ->join('departments', 'employees.department_id', '=', 'departments.department_id')
            ->select('departments.department_name', DB::raw('count(*) as total'))
            ->groupBy('departments.department_name')
            ->get();

        // Prepare data for ECharts
        $chartEmployeeData = [];
        foreach ($employeeCounts as $count) {
            $chartEmployeeData[] = [
                'value' => $count->total,
                'name' => $count->department_name, // Use department name here
            ];
        }

        // Convert to JSON for JavaScript
        $chartEmployeeDataJson = json_encode($chartEmployeeData);

        //get the current leave requests
        $leaves = Leave::with('employee', 'leaveCategory')
            ->where('end_date', '>=', Carbon::today())
            ->where('user_id', auth()->user()->id)
            ->get();

        $totalLeaves = $leaves->count();
        $totalDays = $leaves->sum(function ($leave) {
            return Carbon::parse($leave->start_date)->diffInDays(Carbon::parse($leave->end_date)) + 1;
        });
        $leavesPerCategory = $leaves->groupBy('leaveCategory.leave_type_name')->map->count();

        // Prepare leave approval progress data
        $leaveApprovalData = [];
        foreach ($leaves as $leave) {
            if (($leave->leave_request_status != 'rejected') || ($leave->remainingLeaveDays() >= 0)) {
                $progress = 0;
                $status = '';

                // Determine the approval status and progress
                if ($leave->leave_request_status === 'approved') {
                    $progress = 100;
                    $status = 'Approved';
                } elseif ($leave->leave_request_status === 'rejected') {
                    $progress = 0;
                    $status = 'Rejected';
                } else {
                    // Count stages based on status
                    if ($leave->leave_request_status["HR"] ?? "" === 'approved') {
                        $progress += 33;
                        $status = 'Awaiting HOD Approval';
                    }
                    if ($leave->leave_request_status["Head of Division"] ?? "" === 'approved') {
                        $progress += 33;
                        $status = 'Awaiting Executive Secretary Approval';
                    }
                    if ($leave->leave_request_status["Executive Secretary"] ?? "" === 'approved') {
                        $progress += 34;
                        $status = 'Your Leave request has been granted';
                    }
                }
                $leaveApprovalData[] = [
                    'leave' => $leave,
                    'daysRemaining' => $leave->remainingLeaveDays(),
                    'progress' => $progress,
                    'status' => $status,
                    'hrStatus' => $leave->leave_request_status["HR"] ?? "" === 'approved' ? 'Approved' : 'Pending',
                    'hodStatus' => $leave->leave_request_status["Head of Division"] ?? "" === 'approved' ? 'Apprroved' : 'Pending',
                    'esStatus' => $leave->leave_request_status["Executive Secretary"] ?? "" === 'approved' ? 'Approved' : 'Pending',
                ];




            }
        }

        //get today's birthdates
        // Get users born today (ignoring the year)
        $todayBirthdays = Employee::whereMonth('date_of_birth', Carbon::today()->month)
            ->whereDay('date_of_birth', Carbon::today()->day)
            ->get();

        //number of people on leave
        $numberOfPeopleOnLeave = Leave::whereJsonContains('leave_request_status', ['Executive Secretary' => 'approved'])->count();

                //events and trainings
                $events = Event::where(function ($query) use ($today, $tomorrow) {
                    $query->whereBetween('event_start_date', [$today, $tomorrow])
                        ->orWhere(function ($q) {
                            $q->where('event_start_date', '<', now())
                                ->where('event_end_date', '>', now());
                        });
                })->get();

        return view('dashboard.index', compact('number_of_employees', 'attendances', 'available_leave', 'hours', 'todayCounts', 'yesterdayCounts', 'lateCounts', 'chartDataJson', 'leaveTypesJson', 'chartEmployeeDataJson', 'leaveApprovalData', 'daysUntilExpiry', 'totalLeaves', 'totalDays', 'todayBirthdays', 'numberOfPeopleOnLeave', 'events'));
    }

    //landing page controller
    public function landing_page()
    {
        return view('landing_page.landing_page');
    }

    //service-details for the landing pagge
    public function appraisals()
    {
        return view('landing_page.service-details-appraisals');
    }
    public function training_travel()
    {
        return view('landing_page.service-details-training-travel');
    }
    public function leave_schedule()
    {
        return view('landing_page.service-details-leave-schedule');
    }
    public function applications()
    {
        return view('landing_page.service-details-applications');
    }

    //handle contact emails
    public function send(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        try {
            Mail::raw($data['message'] . '' . 'Message from : ' . $data['email'], function ($mail) use ($request) {
                // to be sent to this email
                $mail->to('dev.david1300@gmail.com')
                    ->subject($request->input('subject'));

            });
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Flash error message if email fails
            return redirect()->back()->with('error', 'Failed to send your message. Please try again.');
        }


    }
}
