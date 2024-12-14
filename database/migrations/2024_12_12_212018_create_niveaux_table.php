<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('niveaux', function (Blueprint $table) {
            $table->id();
            $table->string('nom_niveau');
            $table->foreignId('id_filiere')->constrained('filieres', 'id_filiere');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveaux');
    }
}; 