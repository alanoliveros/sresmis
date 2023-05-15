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
            $table->string('school_year');
            $table->integer('teacher_id');
            $table->integer('student_id');

            $table->string('student_lrn');
            $table->string('student_complete_name');
            $table->string('student_gender');
            $table->string('student_birthdate');
            $table->integer('student_age');
            $table->string('student_mother_tounge');
            $table->string('student_ip');
            $table->string('student_religion');
            $table->string('student_purok');
            $table->string('student_brngy');
            $table->string('student_city');
            $table->string('student_province');
            $table->string('student_father_completename');
            $table->string('student_mother_completename');
            $table->string('student_guardian_completename');
            $table->string('student_guardian_relationship');
            $table->string('student_parent_guardian_contactnumber');
            $table->string('student_learning_modality');
            $table->string('student_remarks');
            $table->integer('total_male');
            $table->integer('total_female');
            $table->integer('total_all');
           
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
