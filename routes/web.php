<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveRosterController;
use App\Http\Controllers\LeaveTypesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OutOfStationTrainingController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaxConfigurationController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Exports\PayrollExport;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GeneralSettingsController;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PublicHolidayController;

Route::get('/', function () {
    return redirect()->route('landing');
});

//landing page routes
Route::get('/landing', [HomeController::class, 'landing_page'])->name('landing');
Route::get('/service-details-appraisals', [HomeController::class, 'appraisals'])->name('appraisals');
Route::get('/service-details-training', [HomeController::class, 'training_travel'])->name('training/travel');
Route::get('/service-details-leave-schedule', [HomeController::class, 'leave_schedule'])->name('leave-schedule');
Route::get('/service-details-applications', [HomeController::class, 'applications'])->name('applications');
Route::post('/send-email', [HomeController::class, 'send'])->name('contact.send');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/leave-roster-tabular/data', [LeaveRosterController::class, 'getLeaveRosterData'])->name('leave-roster-tabular.data');


Route::middleware('auth')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UsersController::class);
    Route::post('roles/{role}/permissions/add', [RoleController::class, 'addPermissions'])->name('roles.permissions.add');
    Route::post('roles/{role}/permissions/remove', [RoleController::class, 'removePermissions'])->name('roles.permissions.remove');


    Route::resource('employees', EmployeeController::class);
    Route::get('/leave-management/data', [LeaveController::class, 'getLeaveManagementData']);
    Route::post('update-entitled-leave-days/{id}', [EmployeeController::class, 'updateEntitledLeaveDays'])->name('update-entitled-leave-days');
    Route::get('/leave-data', [LeaveController::class, 'leaveData'])->name('leave.data');

    Route::resource('events', EventController::class);
    Route::resource('expenses', ExpenseController::class);

    Route::resource('public_holidays', PublicHolidayController::class);

    Route::resource('positions', PositionController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('leaves', LeaveController::class);

    Route::post('/leaves/{leave}/status', [LeaveController::class, 'approveOrReject'])
        ->name('leaves.approveOrReject');
    Route::post('save-leave-data', [LeaveRosterController::class, 'saveLeaveRosterData'])->name('save-leave-data');
    Route::resource('leave-roster', LeaveRosterController::class);
    Route::get('/leave-roster-calendar-data', [LeaveRosterController::class, 'leaveRosterCalendarData'])->name('leave-roster.calendarData');
    Route::get('/leave-roster-tabular', [LeaveRosterController::class, 'getLeaveRoster'])->name('leave-roster-tabular.index');
    Route::get('/leave-roster-tabular/data', [LeaveRosterController::class, 'getLeaveRosterData'])->name('leave-roster-tabular.data');
    Route::resource('leave-types', LeaveTypesController::class);
    Route::post('calender', [leaveRosterController::class, 'getcalender']);
    Route::get('leave-management', [LeaveController::class, 'leaveManagement'])->name('leave-management');
    Route::get('apply-for-leave/{leaveRoster}', [LeaveController::class, 'applyForLeave'])->name('apply-for-leave');
    Route::resource('company-jobs', CompanyJobController::class);
    Route::resource('departments', DepartmentController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //notifications
    Route::resource('/notifications', NotificationController::class);
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::get('/notifications/count', [NotificationController::class, 'getUnreadCount'])->name('notifications.count');

    Route::get('/get-count', [NotificationController::class, 'getCount']);

    Route::resource('tax-configurations', TaxConfigurationController::class);
    Route::resource('general-settings', GeneralSettingsController::class);


    Route::get('pay-roll', [PayrollController::class, 'index'])->name('pay-roll.index');
    Route::get('/payslip/{payroll}', [PayrollController::class, 'downloadPayslip'])->name('payroll.payslip');

    Route::get('/payroll/export', function () {
        return Excel::download(new PayrollExport, 'payroll.xlsx');
    })->name('pay-roll.export');
});

Route::get('/test-concurrency', function () {
    // Optional: Add database query or processing logic here
    return response()->json(['status' => 'success']);
});

require __DIR__ . '/auth.php';
