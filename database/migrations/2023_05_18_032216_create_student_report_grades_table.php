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
        Schema::create('student_report_grades', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->nullable();
            $table->string('school_year')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('grade_level_id')->nullable();
            $table->string('lrn')->nullable();
            $table->string('quarter_1')->nullable();
            $table->string('quarter_2')->nullable();
            $table->string('quarter_3')->nullable();
            $table->string('quarter_4')->nullable();
            $table->string('unit')->nullable();
            $table->string('final_rating')->nullable();
            $table->string('general_average')->nullable();
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
        Schema::dropIfExists('student_report_grades');
    }
};
