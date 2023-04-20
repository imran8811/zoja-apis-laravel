<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('disability');
            $table->string('disabilityDetails');
            $table->string('smoker');
            $table->string('drinker');
            $table->string('childProducer');
            $table->string('requirements');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('others');
    }
};
