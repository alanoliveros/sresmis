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
        Schema::create('school_form1s', function (Blueprint $table) {
            $table->id();
            $table->string('school_year')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('student_lrn')->nullable();
            $table->string('student_complete_name')->nullable();
            $table->string('student_gender')->nullable();
            $table->string('student_birthdate')->nullable();
            $table->integer('student_age')->nullable();
            $table->string('student_mother_tounge')->nullable();
            $table->string('student_ip')->nullable();
            $table->string('student_religion')->nullable();
            $table->string('student_purok')->nullable();
            $table->string('student_brngy')->nullable();
            $table->string('student_city')->nullable();
            $table->string('student_province')->nullable();
            $table->string('student_father_completename')->nullable();
            $table->string('student_mother_completename')->nullable();
            $table->string('student_guardian_completename')->nullable();
            $table->string('student_guardian_relationship')->nullable();
            $table->string('student_parent_guardian_contactnumber')->nullable();
            $table->string('student_learning_modality')->nullable();
            $table->string('student_remarks')->nullable();
            $table->integer('total_male')->nullable();
            $table->integer('total_female')->nullable();
            $table->integer('total_all')->nullable();
           
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
        Schema::dropIfExists('school_form1s');
    }
};
