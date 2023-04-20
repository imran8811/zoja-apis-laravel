<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('contactNo');
            $table->string('caste');
            $table->string('maritalStatus');
            $table->string('noOfSons');
            $table->string('noOfDaughters');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('personal');
    }
};
