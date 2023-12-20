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
            $table->unsignedBigInteger('sw_sweep_assignment_id'); //fk 
            $table->unsignedBigInteger('sw_emp_id'); //fk 
            $table->unsignedBigInteger('sw_student_id'); //fk 
            $table->integer('sw_sweep_tokens');
            $table->enum('sw_request_status',['pending', 'accepted', 'declined']);
            
            
            $table->timestamps();
            $table->foreign('sw_sweep_assignment_id')->references('id')->on('sweep_assignments');
            $table->foreign('sw_emp_id')->references('id')->on('employees');
            $table->foreign('sw_student_id')->references('id')->on('students');
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
