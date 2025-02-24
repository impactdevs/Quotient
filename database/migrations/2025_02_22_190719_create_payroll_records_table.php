<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payroll_records', function (Blueprint $table) {
            $table->id();

            $table->uuid('employee_id');
            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onDelete('cascade');
            $table->decimal('paye', 12, 2);
            $table->decimal('nssf_employee', 12, 2);
            $table->decimal('nssf_employer', 12, 2);
            $table->decimal('net_salary', 12, 2);
            $table->decimal('gross_salary', 12, 2);
            $table->date('start_pay_period');
            $table->date('end_pay_period');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_records');
    }
};
