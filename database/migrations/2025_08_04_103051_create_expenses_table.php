<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users'); // Manager who approves
            $table->string('expense_type'); // e.g., Travel, Meals, Equipment
            $table->decimal('amount', 10, 2); // 10 digits, 2 decimal places
            $table->date('date');
            $table->text('description');
            $table->string('status')->default('pending'); // pending/approved/rejected/paid
            $table->string('receipt_path')->nullable(); // Path to uploaded receipt
            $table->json('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};