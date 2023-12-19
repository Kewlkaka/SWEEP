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
        Schema::create('sweep_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sweep_assignment_id'); //fk 
            $table->unsignedBigInteger('emp_id'); //fk 
            $table->unsignedBigInteger('student_id'); //fk 
            $table->string('sweep_tokens');
            
            
            $table->timestamps();
            $table->foreign('sweep_assignment_id')->references('id')->on('sweep_assignments');
            $table->foreign('emp_id')->references('id')->on('employees');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sweep_histories');
    }
};
