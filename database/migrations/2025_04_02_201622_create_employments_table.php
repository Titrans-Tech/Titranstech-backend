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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('position_applied')->nullable();
            $table->string('start_date')->nullable();
            $table->string('salary_expectation')->nullable();
            $table->string('edu_start_date')->nullable();
            $table->string('edu_end_date')->nullable();
            $table->json('eduction_file')->nullable();
            $table->string('company')->nullable();
            $table->string('position_held')->nullable();
            $table->string('job_description')->nullable();
            $table->string('job_start_date')->nullable();
            $table->string('job_end_date')->nullable();
            $table->string('company2')->nullable();
            $table->string('position_held2')->nullable();
            $table->string('job_description2')->nullable();
            $table->string('job_start_date2')->nullable();
            $table->string('job_end_date2')->nullable();
            $table->string('company3')->nullable();
            $table->string('position_held3')->nullable();
            $table->string('job_description3')->nullable();
            $table->string('job_start_date3')->nullable();
            $table->string('job_end_date3')->nullable();
           $table->string('hard_skill1')->nullable();
           $table->string('hard_skill2')->nullable();
           $table->string('hard_skill3')->nullable();
           $table->string('hard_skill4')->nullable();
           $table->string('hard_skill5')->nullable();

            $table->string('soft_skill1')->nullable();
            $table->string('soft_skill2')->nullable();
            $table->string('soft_skill3')->nullable();
            $table->string('soft_skill4')->nullable();
            $table->string('soft_skill5')->nullable();
            $table->string('elegible')->nullable();
            $table->string('elegible1')->nullable();
            $table->string('convicted')->nullable();
            $table->string('convicted1')->nullable();
            $table->string('mental_stable')->nullable();
            $table->string('mental_stable1')->nullable();
            $table->string('job_experience')->nullable();
            $table->string('job_experience1')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('identification')->nullable();
            $table->string('identification_address')->nullable();
            $table->string('signature')->nullable();
            $table->string('education_level')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
