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
            $table->unsignedBigInteger('emp_id'); //fk 
            $table->string('title');
            $table->text('detail')->nullable();
            $table->boolean('compensation_proposed');
            $table->string('program'); 
            $table->enum('complexity', ['easy', 'medium','hard']); 
            $table->boolean('Prior Experience');
            $table->string('country_requirment');
            $table->enum('status', ['assigned', 'complete','incomplete']); 
            $table->date('deadline');
            $table->timestamps();
            $table->foreign('emp_id')->references('id')->on('employees');
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