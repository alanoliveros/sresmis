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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('adminId');
            $table->integer('teacherId');
            $table->integer('studentId');
            $table->string('school_year');
            $table->bigInteger('lrn');
            $table->integer('sectionId');
            $table->integer('gradeLevelId');
            $table->string('mothertongue')->nullable();
            $table->string('ethnicgroup')->nullable();
            $table->string('religion')->nullable();
            $table->string('learning_modality_id')->nullable();
            $table->integer('status')->default(1); // 1 = active, 2 = dropout;
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
        Schema::dropIfExists('students');
    }
};
