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
        Schema::create('grade_level_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('school_year')->nullable();
            $table->integer('subject_id');
            $table->integer('admin_id');
            $table->integer('grade_level_id');
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
        Schema::dropIfExists('grade_level_subjects');
    }
};
