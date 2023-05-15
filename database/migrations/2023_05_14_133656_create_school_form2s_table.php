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
        Schema::create('school_form2s', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id');
            $table->integer('student_id');
            $table->integer('section_id');
            $table->string('month');
            $table->date('date');
            $table->integer('female_total_perday');
            $table->integer('male_total_perday');
            $table->integer('combined_total_perday');
            $table->integer('total_num_class_permonth');
            $table->date('status');
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
        Schema::dropIfExists('school_form2s');
    }
};
