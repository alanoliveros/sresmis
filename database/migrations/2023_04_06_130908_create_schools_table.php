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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->integer('adminId')->nullable();
            $table->integer('schoolId')->nullable();
            $table->string('schoolName')->nullable();
            $table->string('schoolRegion')->nullable();
            $table->string('schoolDivision')->nullable();
            $table->string('schoolYear')->nullable();
            $table->string('schoolDistrict')->nullable();
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
        Schema::dropIfExists('schools');
    }
};
