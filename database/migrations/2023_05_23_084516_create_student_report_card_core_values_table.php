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
        Schema::create('student_report_card_core_values', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('school_year')->nullable();
            $table->string('core_values')->nullable();
            $table->string('quarter_1')->nullable();
            $table->string('quarter_2')->nullable();
            $table->string('quarter_3')->nullable();
            $table->string('quarter_4')->nullable();
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
        Schema::dropIfExists('student_report_card_core_values');
    }
};
