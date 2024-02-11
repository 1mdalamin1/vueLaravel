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
        Schema::create('mark', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('s_i')->nullable();
            $table->integer('s_ii')->nullable();
            $table->integer('s_iii')->nullable();
            $table->integer('s_iv')->nullable();
            $table->integer('s_v')->nullable();
            $table->integer('s_vi')->nullable();
            $table->integer('s_vii')->nullable();
            $table->integer('s_viii')->nullable();
            $table->integer('s_ix')->nullable();
            $table->integer('s_x')->nullable();
            
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
        Schema::dropIfExists('mark');
    }
};
