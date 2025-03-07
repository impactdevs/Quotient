<!-- ======= Header ======= -->
<header id="header" class="navbar sticky-top header fixed-top d-flex align-items-center">
    <p class="text-primary fw-bold fs-4">
        @php
            $title = '';
            $user = auth()->user();
            $routeName = request()->route()->getName();
            $action = last(explode('.', $routeName));

            if (request()->routeIs('dashboard')) {
                $title = 'Dashboard';
            } elseif (request()->routeIs('leaves.index')) {
                $title = $user->isAdminOrSecretary() ? 'Leaves Management' : 'Apply For Leave';
            } elseif (request()->routeIs(['leave-roster.*', 'leave-roster-tabular.index'])) {
                $title = $user->isAdminOrSecretary() ? 'Leave Roster' : 'My Leave Schedule';
            } elseif (request()->routeIs('leave-management')) {
                $title = 'Leave Management System';
            } elseif (request()->routeIs('attendances.index')) {
                $title = $user->isAdminOrSecretary() ? 'Attendance Records' : 'My Attendance History';
            } elseif (request()->routeIs('events.*')) {
                $title = in_array($action, ['create', 'edit', 'show']) ? ucfirst($action) . ' Event' : 'Event Calendar';
            } elseif (request()->routeIs('employees.*')) {
                $title = $user->isAdminOrSecretary()
                    ? (in_array($action, ['create', 'edit', 'show'])
                        ? ucfirst($action) . ' Employee'
                        : 'Employee Directory')
                    : 'About Me';
            } elseif (request()->routeIs('leave-types.index')) {
                $title = 'Leave Type Policies';
            } elseif (request()->routeIs('positions.index')) {
                $title = 'Organizational Roles';
            } elseif (request()->routeIs('roles.index')) {
                $title = 'System Roles';
            } elseif (request()->routeIs(['leave-types.index', 'leave-types.create', 'leave-types.edit'])) {
                $title = 'Leave Types';
            } elseif (
                request()->routeIs('expenses.index') ||
                request()->routeIs('expenses.create') ||
                request()->routeIs('expenses.edit')
            ) {
                $title = 'Expenses';
            } elseif (request()->routeIs('permissions.index')) {
                $title = 'Access Permissions';
            } elseif (request()->routeIs('users.index')) {
                $title = 'User Accounts';
            } elseif (request()->routeIs('departments.index')) {
                $title = 'Departments Structure';
            } elseif (request()->routeIs('pay-roll.index')) {
                $title = 'Payroll Administration';
            }
        @endphp

        {{ $title }}
    </p>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number" id="notification-badge">0</span>
                </a>
                <!-- Notification Dropdown -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have <span id="notification-count">0</span> new notifications
                        <a href="/notifications"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                                all</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a>
                <!-- Profile Dropdown -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>{{ optional(optional(auth()->user()->employee)->position)->position_name }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('header finished')
            // Function to fetch the unread notification count
            function fetchNotificationCount() {
                $.ajax({
                    url: '/get-count',
                    type: 'GET',
                    success: function(data) {
                        $('#notification-badge').text(data.count);
                        console.log(data)
                        $('#notification-count').text(data.count);
                    }.bind(this), // Bind 'this' to access the clicked element
                    error: function(xhr) {
                        console.error('Error:', xhr);
                    }
                });
            }

            // Fetch the count initially
            fetchNotificationCount();
        });
    </script>
@endpush
