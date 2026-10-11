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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->text('description')->nullable();
        });

        Schema::create('permission', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
        });

        Schema::create('roles_to_permission', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_id');
            $table->unsignedBigInteger('permission_id');
            $table->primary(['roles_id', 'permission_id']);
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permission')->onDelete('cascade');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 191)->unique();
            $table->string('password_hash', 255)->nullable();
            $table->unsignedBigInteger('roles_id');
            $table->boolean('is_active');
            $table->timestamp('created_at')->nullable();

            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
        });

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->unique();
            $table->string('nim', 30)->unique();
            $table->string('full_name', 150);
            $table->string('faculty', 100);
            $table->string('major', 100);
            $table->integer('batch_year');
            $table->string('phone_number', 20);
            $table->text('address')->nullable();
            $table->string('avatar_url', 255)->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('recruitment_periods', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('commitment_template_url', 255)->nullable();
            $table->string('status', 20);
            $table->unsignedBigInteger('users_id');
            $table->timestamp('created_at')->nullable();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('interviewer_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recruitment_periods_id');
            $table->unsignedBigInteger('users_id');
            $table->date('schedule_date');
            $table->string('start_time', 10);
            $table->string('end_time', 10);
            $table->string('location_or_link', 255);
            $table->integer('quota');
            $table->integer('booked_count');
            $table->boolean('is_available');

            $table->foreign('recruitment_periods_id')->references('id')->on('recruitment_periods')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number', 50)->unique();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('recruitment_periods_id');
            $table->string('first_choice_division', 100);
            $table->string('second_choice_division', 100)->nullable();
            $table->text('motivation_letter')->nullable();
            $table->string('status', 40);
            $table->timestamp('submitted_at')->nullable();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recruitment_periods_id')->references('id')->on('recruitment_periods')->onDelete('cascade');
        });

        Schema::create('application_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applications_id');
            $table->string('document_type', 30);
            $table->string('file_url', 255);
            $table->string('file_name', 150);
            $table->timestamp('uploaded_at')->nullable();

            $table->foreign('applications_id')->references('id')->on('applications')->onDelete('cascade');
        });

        Schema::create('document_screenings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applications_id')->unique();
            $table->unsignedBigInteger('users_id');
            $table->string('status', 20);
            $table->text('notes')->nullable();
            $table->timestamp('screened_at')->nullable();

            $table->foreign('applications_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('interview_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applications_id')->unique();
            $table->unsignedBigInteger('interviewer_schedules_id');
            $table->timestamp('booked_at')->nullable();
            $table->string('interview_status', 20);
            $table->integer('interview_score')->nullable();
            $table->text('interview_notes')->nullable();

            $table->foreign('applications_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('interviewer_schedules_id')->references('id')->on('interviewer_schedules')->onDelete('cascade');
        });

        Schema::create('final_selection_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applications_id')->unique();
            $table->unsignedBigInteger('evaluator_id');
            $table->string('final_status', 20);
            $table->string('accepted_division', 100)->nullable();
            $table->text('decision_notes')->nullable();
            $table->timestamp('decided_at')->nullable();

            $table->foreign('applications_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('evaluator_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('commitment_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applications_id')->unique();
            $table->string('signed_document_url', 255);
            $table->string('wa_confirmation_status', 20);
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('uploaded_at')->nullable();

            $table->foreign('applications_id')->references('id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commitment_submissions');
        Schema::dropIfExists('final_selection_results');
        Schema::dropIfExists('interview_appointments');
        Schema::dropIfExists('document_screenings');
        Schema::dropIfExists('application_documents');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('interviewer_schedules');
        Schema::dropIfExists('recruitment_periods');
        Schema::dropIfExists('user_profiles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles_to_permission');
        Schema::dropIfExists('permission');
        Schema::dropIfExists('roles');
    }
};
