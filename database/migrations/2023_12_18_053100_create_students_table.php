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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_email')->unique(); //
            $table->string('student_password'); //
            $table->string('student_name'); //
            
            //step1
            $table->longText('student_desc'); //

            //step2
            $table->string('student_university_name'); //
            $table->enum('student_gender', ['M', 'F']); //
            $table->unsignedBigInteger('student_program_id'); //fk
            $table->unsignedBigInteger('student_level_of_education_id'); //fk
            $table->integer('student_current_year'); //

            //step3
            $table->integer('student_work_experience'); //
            $table->unsignedBigInteger('student_country_id'); //fk
            $table->date('student_dob');  //

            //auth 
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps();
            $table->foreign('student_program_id')->references('id')->on('programs');
            $table->foreign('student_level_of_education_id')->references('id')->on('levels_of_education');
            $table->foreign('student_country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
