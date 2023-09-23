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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood')->nullable();
            $table->string('nid')->nullable();
            $table->text('image')->nullable();
            $table->string('dob')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('salary')->nullable();
            $table->integer('created_at_id')->nullable();
            $table->integer('updateted_at_id')->nullable();
            $table->integer('institute_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
