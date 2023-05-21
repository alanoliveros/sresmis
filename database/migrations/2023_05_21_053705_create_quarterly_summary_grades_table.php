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
        Schema::create('quarterly_summary_grades', function (Blueprint $table) {
            $table->id();
            $table->string('school_year')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('grade_level_id')->nullable();
            $table->integer('quarter_1')->nullable();
            $table->integer('quarter_2')->nullable();
            $table->integer('quarter_3')->nullable();
            $table->integer('quarter_4')->nullable();
            $table->float('final_grade',8 ,2)->nullable();
            $table->string('remarks')->nullable();  //passed //failed
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
        Schema::dropIfExists('quarterly_summary_grades');
    }
};
