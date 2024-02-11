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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood')->nullable();
            $table->string('dob')->nullable();
            $table->string('session')->nullable();
            $table->string('religion')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('class_name')->nullable();
            $table->integer('roll_no')->nullable();
            $table->text('image')->nullable();
            $table->text('note')->nullable();
            $table->integer('serial_no')->nullable();
            $table->integer('created_at_user_id')->nullable();
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
        Schema::dropIfExists('student');
    }
};
