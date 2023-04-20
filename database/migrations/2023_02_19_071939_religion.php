<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('religion', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('religion');
            $table->string('subReligion');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('religion');
    }
};
