<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('appearance', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('age');
            $table->string('complexion');
            $table->string('weight');
            $table->string('feet');
            $table->string('inch');
            $table->string('headType');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('appearance');
    }
};
