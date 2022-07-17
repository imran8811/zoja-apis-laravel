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
        Schema::create('profiles', function (Blueprint $table) {
            $table->string('contactNo');
            $table->string('professionType');
            $table->string('income');
            $table->string('religion');
            $table->string('caste');
            $table->string('degreeLevel');
            $table->string('institute');
            $table->string('country');
            $table->string('city');
            $table->string('status');
            $table->string('age');
            $table->string('complexion');
            $table->string('weight');
            $table->string('feet');
            $table->string('inch');
            $table->string('motherLanguage');
            $table->string('requirements');
            $table->string('jobTitle');
            $table->string('noOfSons');
            $table->string('noOfDaughters');
            $table->string('userId');
            $table->id();
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
        Schema::dropIfExists('profiles');
    }
};
