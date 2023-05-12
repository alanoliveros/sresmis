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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('adminId');
            $table->integer('teacherId');
            $table->integer('sectionId');
            $table->integer('gradeLevelId');
            $table->integer('addressId');
            $table->string('school_year');
            $table->string('designation');
            $table->integer('employeeNumber');
            $table->string('position');
            $table->string('fundSource');
            $table->string('degree');
            $table->string('major');
            $table->string('minor')->nullable();
            $table->integer('totalTeachingTimePerWeek');
            $table->integer('numberOfAncillary');
            $table->integer('status')->default(1); // 1 = alive, 2 = dead;
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
        Schema::dropIfExists('teachers');
    }
};
