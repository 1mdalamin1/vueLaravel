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
        Schema::create('institution', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('logo')->nullable();
            $table->string('address')->nullable();
            $table->integer('limit')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->text('image')->nullable();
            $table->timestamp('expiry_date')->useCurrent();
            $table->text('signature')->nullable();
            $table->text('note')->nullable();
            $table->integer('created_at_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution');
    }
};
