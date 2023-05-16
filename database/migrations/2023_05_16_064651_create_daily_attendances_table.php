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
        Schema::create('daily_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('adminId');
            $table->integer('teacherId');
            $table->integer('gradeLevelId');
            $table->integer('sectionId');
            $table->integer('studentId');
            $table->integer('school_year');
            $table->date('date');
            $table->string('month');
            $table->string('status');
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
        Schema::dropIfExists('daily_attendances');
    }
};
