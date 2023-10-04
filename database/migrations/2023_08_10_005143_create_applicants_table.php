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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_code');
            $table->string('applicant_first_name');
            $table->string('applicant_middle_name');
            $table->string('applicant_last_name');
            $table->string('profile_picture');
            $table->string('residential_address');
            $table->string('telephone_number')->nullable();
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('civil_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
