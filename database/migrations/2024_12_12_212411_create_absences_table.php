<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id('id_absence');
            $table->foreignId('id_seance')->constrained('seances', 'id_seance');
            $table->foreignId('id_user')->constrained('user', 'id_user');
            $table->integer('nbr_heure_total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absences');
    }
}; 