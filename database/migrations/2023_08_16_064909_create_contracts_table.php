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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('applicant_id');
            $table->date('effective_start_date');
            $table->date('effective_end_date');
            $table->string('diff_days');
            $table->string('status')->default('active');
            $table->string('office_place_assignment')->nullable();
            $table->string('work_contract_person')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
