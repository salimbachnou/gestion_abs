<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id('id_groupe');
            $table->string('nom_groupe');
            $table->foreignId('niveau_id')->constrained('niveaux');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groupes');
    }
}; 