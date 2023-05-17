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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('adminId');
            $table->integer('gradeLevelId');
            $table->integer('sectionId');
            $table->string('subjectName');
            $table->string('description')->nullable();
            $table->integer('written_work_percentage')->nullable();
            $table->integer('performance_tasks_percentage')->nullable();
            $table->integer('quarterly_assessment_percentage')->nullable();
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
        Schema::dropIfExists('subjects');
    }
};
