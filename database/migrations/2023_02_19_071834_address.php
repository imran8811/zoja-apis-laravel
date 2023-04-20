<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('currentAddessArea');
            $table->string('currentAddessCity');
            $table->string('currentAddessCountry');
            $table->string('permanentAddessArea');
            $table->string('permanentAddessCity');
            $table->string('permanentAddessCountry');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('address');
    }
};
