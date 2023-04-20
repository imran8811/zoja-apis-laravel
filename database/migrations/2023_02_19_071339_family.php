<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('family', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('father');
            $table->string('mother');
            $table->string('sisters');
            $table->string('marriedSisters');
            $table->string('brothers');
            $table->string('marriedBrothers');
            $table->string('siblingNumber');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('family');
    }
};
