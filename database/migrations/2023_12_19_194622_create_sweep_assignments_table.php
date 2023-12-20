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
        Schema::create('sweep_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sw_emp_id'); //fk 
            $table->string('sw_title');
            $table->text('sw_detail')->nullable();
            $table->enum('sw_compensation_proposed', ['Yes', 'No']);
            $table->unsignedBigInteger('sw_student_program_req_id'); 
            $table->enum('sw_complexity', ['easy', 'medium','hard']); 
            $table->enum('sw_student_prior_experience_req', ['Yes', 'No']);
            $table->unsignedBigInteger('sw_student_country_req_id');
            $table->enum('sw_status', ['assigned', 'complete','incomplete']); 
            $table->date('sw_deadline');
            
            $table->timestamps();

            $table->foreign('sw_emp_id')->references('id')->on('employees');
            $table->foreign('sw_student_program_req_id')->references('id')->on('programs');
            $table->foreign('sw_student_country_req_id')->references('id')->on('countries');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sweep_assignments');
    }
};
