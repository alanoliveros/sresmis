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
            $table->integer('adminId')->nullable();

            $table->string('lrn')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('ethnic_group')->nullable();
            $table->string('mothertongue')->nullable();
            $table->string('religion')->nullable();
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

            $table->date('enrolled_date')->nullable();
            $table->integer('enrollment_status')->nullable();


            $table->integer('dropped_out')->nullable();
            $table->date('dropped_date')->nullable();
            $table->integer('dropped_reason')->nullable();

            $table->integer('transferred_out')->nullable();
            $table->date('transferred_out_date')->nullable();
            $table->integer('transferred_in')->nullable();
            $table->date('transferred_in_date')->nullable();

            $table->string('current_status')->nullable();
            $table->string('moving_up_status')->nullable();  //repeater || moved up
            $table->string('academic_status')->nullable();  //passed or failed
            $table->string('remarks')->nullable();  //passed or failed



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
