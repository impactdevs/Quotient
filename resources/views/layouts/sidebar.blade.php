<div class="border-dashed shadow sidebar bg-primary border-start border-start-5 rounded-start-5"
    style="position: sticky; top: 0; height: 100vh; overflow-y: auto;">
    <div class="border-bottom border-bottom-5 h-25 d-flex align-items-center justify-content-center">
        <img src="{{ asset('assets/img/quotient.png') }}" alt="company logo"
            class="border rounded object-fit-contain img-fluid" style="max-width: 100%; height: auto;">
    </div>
    <div class="p-0 d-md-flex flex-column pt-lg-3">
        <h6
        class="px-3 my-3 text-uppercase text-body-secondary text-light d-flex justify-content-between align-items-center">
        <span class="text-light">GENERAL</span>
        <i class="bi bi-bar-chart text-light"></i>
    </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('dashboard')) bg-secondary @endif"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-bar-chart"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('leave-roster.index') || request()->routeIs('leave-roster-tabular.index')) bg-secondary @endif"
                    href="{{ route('leave-roster.index') }}">
                    <i class="bi bi-calendar-plus"></i>
                    {{ auth()->user()->isAdminOrSecretary() ? 'Leave Roster' : 'My Leave Roster' }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('leaves.index')) bg-secondary @endif"
                    href="{{ route('leaves.index') }}">
                    <i class="bi bi-bus-front"></i>
                    {{ auth()->user()->isAdminOrSecretary() ? 'Leaves' : 'Apply For Leave' }}
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('attendances.index')) bg-secondary @endif"
                    href="{{ route('attendances.index') }}">
                    <i class="bi bi-check2-all"></i>
                    {{ auth()->user()->isAdminOrSecretary() ? 'Attendances' : 'My Attendance History' }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('events.index')) bg-secondary @endif"
                    href="{{ route('events.index') }}">
                    <i class="bi bi-calendar"></i>
                    {{ auth()->user()->isAdminOrSecretary() ? 'Events' : 'My Events' }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('expenses.index')) bg-secondary @endif"
                    href="{{ route('expenses.index') }}">
                    <i class="bi bi-currency-dollar"></i>
                    {{ auth()->user()->isAdminOrSecretary() ? 'Expenses' : 'My Expenses' }}
                </a>
            </li>


            <li class="nav-item">
                @php
                    $currentUrl = auth()->user()->isAdminOrSecretary() ? 'employees.index' : 'employees.show';
                @endphp
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs($currentUrl)) bg-secondary @endif"
                    href="{{ auth()->user()->isAdminOrSecretary() ? route('employees.index') : route('employees.show', auth()->user()->employee->employee_id) }}">
                    <i class="bi bi-database-down"></i>
                    {{ auth()->user()->isAdminOrSecretary() ? 'Employees' : 'About Me' }}
                </a>
            </li>

            @if (auth()->user()->isAdminOrSecretary())
                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('pay-roll.index')) bg-secondary @endif"
                        href="{{ route('pay-roll.index') }}">
                        <i class="bi bi-list-ul"></i>
                        Payroll
                    </a>
                </li>
            @endif

        </ul>
        @if (auth()->user()->hasRole('HR'))
            <h6
                class="px-3 my-3 text-uppercase text-body-secondary text-light d-flex justify-content-between align-items-center">
                <span class="text-light">Settings</span>
                <i class="bi bi-gear text-light"></i>
            </h6>
            <ul class="mb-auto nav flex-column">

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs(['leave-types.index', 'leave-types.create', 'leave-types.edit'])) bg-secondary @endif" href="{{ route('leave-types.index') }}">
                        <i class="bi bi-gear"></i>
                        Leave types
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs(['positions.index', 'positions.create', 'positions.edit'])) bg-secondary @endif" href="{{ route('positions.index') }}">
                        <i class="bi bi-gear"></i>
                        Positions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs(['roles.index', 'roles.create', 'roles.edit'])) bg-secondary @endif" href="{{ route('roles.index') }}">
                        <i class="bi bi-gear"></i>
                        Roles
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs('permissions.index')) bg-secondary @endif" href="{{ route('permissions.index') }}">
                        <i class="bi bi-gear"></i>
                        Permissions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs('users.index')) bg-secondary @endif" href="{{ route('users.index') }}">
                        <i class="bi bi-gear"></i>
                        User Management
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs(['departments.index', 'departments.edit', 'departments.create'])) bg-secondary @endif" href="{{ route('departments.index') }}">
                        <i class="bi bi-gear"></i>
                        Departments
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs('tax-configurations.index')) bg-secondary @endif" href="{{ route('tax-configurations.index') }}">
                        <i class="bi bi-gear"></i>
                        Tax Configurations
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs(['public_holidays.index', 'public_holidays.edit','public_holidays.create'])) bg-secondary @endif" href="{{ route('public_holidays.index') }}">
                        <i class="bi bi-gear"></i>
                        Public holidays
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center gap-2 fs-6 fw-bold @if (request()->routeIs(['general-settings.index', 'general-settings.edit'])) bg-secondary @endif" href="{{ route('general-settings.index') }}">
                        <i class="bi bi-gear"></i>
                        General Settings
                    </a>
                </li>
            </ul>

        @endif

        <h6
            class="px-3 my-3 text-uppercase text-body-secondary text-light d-flex justify-content-between align-items-center">
            <span class="text-light">Documentation</span>
            <i class="bi bi-gear text-light"></i>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center gap-2 fs-5 fw-bold @if (request()->routeIs('docs')) bg-secondary @endif"
                    href="/docs">
                    <i class="bi bi-file-earmark-text"></i>
                    User Manual
                </a>
            </li>
    </div>
</div>
