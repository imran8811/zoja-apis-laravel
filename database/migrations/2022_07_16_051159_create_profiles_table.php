<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('profiles', function (Blueprint $table) {
            $table->string('profileType');
            $table->string('contactNo');
            $table->string('professionType');
            $table->string('income');
            $table->string('religion');
            $table->string('subReligion');
            $table->string('caste');
            $table->string('degreeLevel');
            $table->string('degreeType');
            $table->string('degreeYear');
            $table->string('institute');
            $table->string('maritalStatus');
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
            $table->string('headType');
            $table->string('smoker');
            $table->string('drinker');
            $table->string('childProducer');
            $table->string('father');
            $table->string('mother');
            $table->string('sisters');
            $table->string('marriedSisters');
            $table->string('brothers');
            $table->string('marriedBrothers');
            $table->string('siblingNumber');
            $table->string('currentAddessArea');
            $table->string('currentAddessCity');
            $table->string('currentAddessCountry');
            $table->string('permanentAddessArea');
            $table->string('permanentAddessCity');
            $table->string('permanentAddessCountry');
            $table->id();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('profiles');
    }
};
