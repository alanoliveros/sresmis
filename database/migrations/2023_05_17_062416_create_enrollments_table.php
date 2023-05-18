<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->string('lrn')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('purok')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->integer('grade_level_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->string('school_year')->nullable();
            $table->integer('enrollment_status')->nullable();
            $table->date('date_enrolled')->nullable();
            $table->date('date_dropped')->nullable();
            $table->date('date_transferred_in')->nullable();
            $table->date('date_transferred_out')->nullable();
            $table->integer('academic_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
