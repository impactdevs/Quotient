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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('nssf_cap', 20, 5); // e.g., 10.00%
            $table->decimal('employee_nssf_rate', 5, 2); // e.g., 10.00%
            $table->decimal('employer_nssf_rate', 5, 2); // e.g., 10.00%
            $table->string('payroll_frequency')->default('monthly'); // weekly, bi-weekly, monthly
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};