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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('employee_id')->nullable();
            $table->string('profile_picture')->nullable();
            $table->date('date')->nullable();
            $table->integer('mobile_number');
            $table->enum('gender', ['male', 'female']);
            $table->string('address')->nullable();
            $table->longText('about')->nullable();
            $table->boolean('is_receive_email_notification')->default(0);
            $table->integer('hourly_rate');
            $table->string('skills')->nullable();
            $table->dateTime('probation_end')->nullable();
            $table->dateTime('period_start_date')->nullable();
            $table->dateTime('period_end_date')->nullable();
            $table->enum('employment_type', ['full_time', 'part_time', 'on_contract', 'internship', 'trainee']);
            $table->enum('marital_status', ['single', 'married']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
