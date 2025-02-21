<x-app-layout>
    <section class="section dashboard m-2">
        @if (auth()->user()->isAdminOrSecretary())
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Employees</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $number_of_employees }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
                        @if (count($todayBirthdays))
                            <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3 text-bg-primary"
                                role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <!-- SVG Cake Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cake2" viewBox="0 0 16 16">
                                        <path
                                            d="m3.494.013-.595.79A.747.747 0 0 0 3 1.814v2.683q-.224.051-.432.107c-.702.187-1.305.418-1.745.696C.408 5.56 0 5.954 0 6.5v7c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 15.773 5.898 16 8 16s4.022-.227 5.432-.603c.701-.187 1.305-.418 1.745-.696.415-.261.823-.655.823-1.201v-7c0-.546-.408-.94-.823-1.201-.44-.278-1.043-.51-1.745-.696A12 12 0 0 0 13 4.496v-2.69a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 12 1.813V4.3a22 22 0 0 0-2-.23V1.806a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 9 1.813v2.204a29 29 0 0 0-2 0V1.806A.747.747 0 0 0 7.092.802l-.598-.79-.595.792A.747.747 0 0 0 6 1.813V4.07c-.71.05-1.383.129-2 .23V1.806A.747.747 0 0 0 4.092.802zm-.668 5.556L3 5.524v.967q.468.111 1 .201V5.315a21 21 0 0 1 2-.242v1.855q.488.036 1 .054V5.018a28 28 0 0 1 2 0v1.964q.512-.018 1-.054V5.073c.72.054 1.393.137 2 .242v1.377q.532-.09 1-.201v-.967l.175.045c.655.175 1.15.374 1.469.575.344.217.356.35.356.356s-.012.139-.356.356c-.319.2-.814.4-1.47.575C11.87 7.78 10.041 8 8 8c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 6.639 1 6.506 1 6.5s.012-.139.356-.356c.319-.2.814-.4 1.47-.575M15 7.806v1.027l-.68.907a.94.94 0 0 1-1.17.276 1.94 1.94 0 0 0-2.236.363l-.348.348a1 1 0 0 1-1.307.092l-.06-.044a2 2 0 0 0-2.399 0l-.06.044a1 1 0 0 1-1.306-.092l-.35-.35a1.935 1.935 0 0 0-2.233-.362.935.935 0 0 1-1.168-.277L1 8.82V7.806c.42.232.956.428 1.568.591C3.978 8.773 5.898 9 8 9s4.022-.227 5.432-.603c.612-.163 1.149-.36 1.568-.591m0 2.679V13.5c0 .006-.012.139-.356.355-.319.202-.814.401-1.47.576C11.87 14.78 10.041 15 8 15c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575-.344-.217-.356-.35-.356-.356v-3.02a1.935 1.935 0 0 0 2.298.43.935.935 0 0 1 1.08.175l.348.349a2 2 0 0 0 2.615.185l.059-.044a1 1 0 0 1 1.2 0l.06.044a2 2 0 0 0 2.613-.185l.348-.348a.94.94 0 0 1 1.082-.175c.781.39 1.718.208 2.297-.426" />
                                    </svg>
                                    <strong class="me-auto">Today's Birthdays</strong>
                                    {{-- <small>11 mins ago</small> --}}
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    @foreach ($todayBirthdays as $todayBirthday)
                                        <p>{{ $todayBirthday->first_name }} {{ $todayBirthday->last_name }}
                                            - {{ $todayBirthday->department->department_name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif




                        <!-- Revenue Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Attendees <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $attendances }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Leave <span>| Currently</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $numberOfPeopleOnLeave }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Birthdays <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ count($todayBirthdays) }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Clock Ins <span>/Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div><!-- End Reports -->

                        <!-- Ongoing Appraisals -->

                        <div class="col-12">
                            <div class="card">


                                <div id="svg-tree">

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Budget Report -->
                    <div class="card">
                        <div class="card-body">
                            <div id="leaveChart" style="min-height: 400px; min-width: 100%;" class="echart"></div>

                        </div>
                    </div><!-- End Budget Report -->

                    <!-- Website Traffic -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Employee Distribution</h5>

                            <div id="departmentchart" style="min-height: 70vh;" class="echart"></div>


                        </div>
                    </div><!-- End Website Traffic -->

                </div><!-- End Right side columns -->

            </div>
        @elseif (auth()->user()->hasRole('Staff'))
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Leave Days Allocated</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ auth()->user()->employee->entitled_leave_days }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Leave Utilized <span>| This Year</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ auth()->user()->employee->totalLeaveDays() }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->
                        @if (count($leaveApprovalData) > 0)
                            <!-- Leave Approval Progress -->
                            <div class="col-xxl-12 col-md-12">
                                <div class="card info-card leave-approval-card border border-5 border-primary">
                                    <div class="card-body">
                                        @foreach ($leaveApprovalData as $leaveData)
                                            <div class="leave-approval-item">
                                                <h6>Leave Requests</h6>

                                                @if ($leaveData['esStatus'] === 'Approved')
                                                    <!-- Hide progress area -->
                                                    <div class="congratulations-message">
                                                        <div class="balloons-css">
                                                            <div class="balloon"></div>
                                                            <div class="balloon"></div>
                                                            <div class="balloon"></div>
                                                            <div class="balloon"></div>
                                                        </div>
                                                        <p class="text-success fw-bold">🎉 Congratulations! 🎈 Your
                                                            Leave Request was approved!!</p>
                                                        @if ($leaveData['daysRemaining'] == 'Leave has not started')
                                                            <p>Leave has not started yet!!</p>
                                                        @else
                                                            <p class="text-success fw-bold">Days remaining to complete
                                                                leave:
                                                                {{ $leaveData['daysRemaining'] }}</p>
                                                        @endif
                                                    </div>
                                                @elseif ($leaveData['status'] === 'Pending' && isset($leaveData['rejection_reason']))
                                                    <div class="rejected-message">
                                                        <h6>Status: Rejected</h6>
                                                        <p>Reason: {{ $leaveData['rejection_reason'] }}</p>
                                                    </div>
                                                @else
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $leaveData['progress'] }}%;"
                                                            aria-valuenow="{{ $leaveData['progress'] }}"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{ $leaveData['status'] }}
                                                        </div>
                                                    </div>
                                                    <small>HR Review: {{ $leaveData['hrStatus'] }}</small><br>
                                                    <small>HOD Review: {{ $leaveData['hodStatus'] }}</small><br>
                                                    <small>Executive Staff Review: {{ $leaveData['esStatus'] }}</small>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- End Leave Approval Progress Card -->
                        @endif
                        @if ($daysUntilExpiry <= 90)
                            <!-- Revenue Card -->
                            <div class="col-xxl-12 col-md-12">
                                @if ($daysUntilExpiry >= 0 && $daysUntilExpiry != null)
                                    <div class="alert alert-warning mt-3">
                                        <h5>Contract Expiry Notification</h5>
                                        <p>Your contract is expiring in <strong>{{ $daysUntilExpiry }}
                                                days</strong>.</p>
                                        <div class="countdown"
                                            data-expiry="{{ auth()->user()->employee->contract_expiry_date }}">
                                        </div>
                                    </div>
                                @endif
                                @if ($daysUntilExpiry < 0)
                                    <div class="alert alert-danger">
                                        <h5>Contract Expired</h5>
                                        <p>Your contract expired <strong>{{ abs($daysUntilExpiry) }} days
                                                ago</strong>.</p>
                                    </div>
                                @endif

                            </div><!-- End Revenue Card -->
                        @endif

                    </div>
                </div>

                <!-- Right side columns -->
                <div class="col-lg-4">
                    <!-- Budget Report -->
                    <div class="card">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Allocated Leave Analysis <span>| This Month</span></h5>

                            <div id="leaveChart" style="min-height: 400px;" class="echart"></div>

                        </div>
                    </div><!-- End Budget Report -->




                </div><!-- End Right side columns -->

            </div>
        @endif
    </section>


    @push('scripts')
        @vite(['resources/js/custom-dashboard.js'])

        <script type="module">
            $(document).ready(function() {
                var leaveTypes = {!! $leaveTypesJson !!}; // Leave type names
                var allocatedDays = {!! $chartDataJson !!}; // Allocated leave days
                var employeeData = {!! $chartEmployeeDataJson !!};

                console.log(employeeData)

                console.log(leaveTypes, allocatedDays)

                var leaveChart = echarts.init(document.querySelector("#leaveChart"));
                leaveChart.setOption({
                    title: {
                        text: 'Allocated Leave Analysis',
                        left: 'center'
                    },
                    legend: {
                        data: ['Allocated Leave Days']
                    },
                    radar: {
                        indicator: leaveTypes.map((type, index) => ({
                            name: type,
                            max: Math.max(...allocatedDays) + 5,
                            color: 'blue',
                            axisLabel: {
                                show: index === 0, // Show label only on the first axis (index 0)
                                color: "grey",
                                margin: 10 // Add space between the axis and label
                            }
                        })),
                        center: ['50%', '50%'], // Center the radar chart within the container
                        radius: '46%', // Adjust radius to avoid clipping
                    },
                });

                //resize on screen resize
                window.addEventListener('resize', function() {
                    leaveChart.resize();
                });



                echarts.init(document.querySelector("#departmentchart")).setOption({
                    title: {
                        text: 'Number of Employees per Department',
                        left: 'center'
                    },
                    tooltip: {
                        trigger: 'item'
                    },
                    legend: {
                        top: '5%',
                        left: 'center',
                    },
                    series: [{
                        name: 'Employees by Department',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                            show: true,
                            position: 'inside',
                        },
                        emphasis: {
                            label: {
                                show: true,
                                fontSize: '18',
                                fontWeight: 'bold'
                            }
                        },
                        labelLine: {
                            show: true
                        },
                        data: employeeData
                    }]
                });
                //attendance analysis
                new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                        name: 'Today',
                        data: @json($todayCounts),
                    }, {
                        name: 'Yesterday',
                        data: @json($yesterdayCounts),
                    }, {
                        name: 'Late Arrivals',
                        data: @json($lateCounts),
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                    },
                    markers: {
                        size: 4
                    },
                    colors: ['#4154f1', '#ff771d', '#ffbc00'], // Different colors for each series
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: @json($hours),
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy HH:mm'
                        },
                    }
                }).render();

                //hierachy chart
                const data = {
                    id: 'ms',
                    data: {
                        imageURL: 'https://i.pravatar.cc/300?img=68',
                        name: 'Margret Swanson',
                    },
                    options: {
                        nodeBGColor: '#cdb4db',
                        nodeBGColorHover: '#cdb4db',
                    },
                    children: [{
                            id: 'mh',
                            data: {
                                imageURL: 'https://i.pravatar.cc/300?img=69',
                                name: 'Mark Hudson',
                            },
                            options: {
                                nodeBGColor: '#ffafcc',
                                nodeBGColorHover: '#ffafcc',
                            },
                            children: [{
                                    id: 'kb',
                                    data: {
                                        imageURL: 'https://i.pravatar.cc/300?img=65',
                                        name: 'Karyn Borbas',
                                    },
                                    options: {
                                        nodeBGColor: '#f8ad9d',
                                        nodeBGColorHover: '#f8ad9d',
                                    },
                                },
                                {
                                    id: 'cr',
                                    data: {
                                        imageURL: 'https://i.pravatar.cc/300?img=60',
                                        name: 'Chris Rup',
                                    },
                                    options: {
                                        nodeBGColor: '#c9cba3',
                                        nodeBGColorHover: '#c9cba3',
                                    },
                                },
                            ],
                        },
                        {
                            id: 'cs',
                            data: {
                                imageURL: 'https://i.pravatar.cc/300?img=59',
                                name: 'Chris Lysek',
                            },
                            options: {
                                nodeBGColor: '#00afb9',
                                nodeBGColorHover: '#00afb9',
                            },
                            children: [{
                                    id: 'Noah_Chandler',
                                    data: {
                                        imageURL: 'https://i.pravatar.cc/300?img=57',
                                        name: 'Noah Chandler',
                                    },
                                    options: {
                                        nodeBGColor: '#84a59d',
                                        nodeBGColorHover: '#84a59d',
                                    },
                                },
                                {
                                    id: 'Felix_Wagner',
                                    data: {
                                        imageURL: 'https://i.pravatar.cc/300?img=52',
                                        name: 'Felix Wagner',
                                    },
                                    options: {
                                        nodeBGColor: '#0081a7',
                                        nodeBGColorHover: '#0081a7',
                                    },
                                },
                            ],
                        },
                    ],
                };
                const options = {
                    contentKey: 'data',
                    width: 800,
                    height: 600,
                    nodeWidth: 150,
                    nodeHeight: 100,
                    fontColor: '#fff',
                    borderColor: '#333',
                    childrenSpacing: 50,
                    siblingSpacing: 20,
                    direction: 'top',
                    nodeTemplate: (content) =>
                        `<div style='display: flex;flex-direction: column;gap: 10px;justify-content: center;align-items: center;height: 100%;'>
          <img style='width: 50px;height: 50px;border-radius: 50%;' src='${content.imageURL}' alt='' />
          <div style="font-weight: bold; font-family: Arial; font-size: 14px">${content.name}</div>
         </div>`,
                    enableToolbar: false,
                };
                const tree = new ApexTree(document.getElementById('svg-tree'), options);
                tree.render(data);

            });

            //real notifications
        </script>
    @endpush
</x-app-layout>
