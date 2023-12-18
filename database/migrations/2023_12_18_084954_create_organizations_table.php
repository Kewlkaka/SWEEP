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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('org_email')->unique(); //
            $table->string('org_password'); //
            $table->string('org_name'); //
            $table->string('org_desc'); //
            $table->unsignedBigInteger('org_industry_id'); //
            $table->unsignedBigInteger('org_country_id'); //

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps();
            $table->foreign('org_country_id')->references('id')->on('countries');
            $table->foreign('org_industry_id')->references('id')->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
