<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->id('id_filiere');
            $table->string('nom_filiere');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('filieres');
    }
}; 