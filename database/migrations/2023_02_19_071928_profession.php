<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('profession', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('professionType');
            $table->string('professionTitle');
            $table->string('jobLocation');
            $table->string('businessLocation');
            $table->string('income');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('profession');
    }
};
