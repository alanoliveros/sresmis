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
        Schema::create('student_assessment_scores', function (Blueprint $table) {
            $table->id();
            $table->string('sy')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('quarter_id')->nullable();

            $table->string('written_student_score')->nullable();
            $table->string('written_possible_score')->nullable();
            $table->integer('written_total_possible_score')->nullable();
            $table->integer('written_total_student_score')->nullable();
            $table->integer('written_student_percentage_score')->nullable();
            $table->integer('written_student_weighted_average')->nullable();

            $table->string('performance_student_score')->nullable();
            $table->string('performance_possible_score')->nullable();
            $table->integer('performance_total_student_score')->nullable();
            $table->integer('performance_total_possible_score')->nullable();
            $table->integer('performance_student_percentage_score')->nullable();
            $table->integer('performance_student_weighted_average')->nullable();

            $table->string('quarterly_assessment_student_score')->nullable();
            $table->string('quarterly_assessment_possible_score')->nullable();
            $table->integer('quarterly_total_assessment_student_score')->nullable();
            $table->integer('quarterly_total_assessment_possible_score')->nullable();
            $table->integer('quarterly_assessment_student_percentage_score')->nullable();
            $table->integer('quarterly_assessment_student_weighted_average')->nullable();

            $table->float('initial_grade', 8, 2)->nullable();
            $table->integer('quarterly_grade')->nullable();
            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('student_assessment_scores');
    }
};
