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
        Schema::create('parent_guardians', function (Blueprint $table) {
            $table->id();
            $table->integer('adminId');
            $table->integer('teacherId');
            $table->integer('studentId');
            $table->string('fathersFirstName')->nullable();
            $table->string('fathersMiddleName')->nullable();
            $table->string('fathersLastName')->nullable();
            $table->string('fathersSuffix')->nullable();

            $table->string('mothersFirstName')->nullable();
            $table->string('mothersMiddleName')->nullable();
            $table->string('mothersLastName')->nullable();
            $table->string('mothersSuffix')->nullable();

            $table->string('guardiansFirstName')->nullable();
            $table->string('guardiansMiddleName')->nullable();
            $table->string('guardiansLastName')->nullable();
            $table->string('guardiansSuffix')->nullable();

            $table->string('relationshiptoStudent')->nullable();
            $table->bigInteger('contactNumber')->nullable();

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
        Schema::dropIfExists('parent_guardians');
    }
};
