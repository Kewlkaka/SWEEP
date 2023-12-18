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
                $table->string('emp_email')->unique(); //
                $table->string('emp_password'); //
                $table->string('emp_name'); //
                
                $table->longText('emp_desc'); //
    
                $table->string('emp_org_name'); //
                $table->string('emp_position');
                $table->unsignedBigInteger('emp_country_id'); //fk
                $table->integer('emp_work_experience'); 
                $table->enum('emp_gender', ['M', 'F']); //
                $table->unsignedBigInteger('emp_industry_id'); //fk
    
                //auth 
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
    
                $table->timestamps();
                $table->foreign('emp_country_id')->references('id')->on('countries');
                $table->foreign('emp_industry_id')->references('id')->on('industries');
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
