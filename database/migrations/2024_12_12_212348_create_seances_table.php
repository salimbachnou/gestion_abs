<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id('id_seance');
            $table->date('date_de_seance');
            $table->foreignId('niveau_id')->constrained('niveaux');
            $table->foreignId('id_groupe')->constrained('groupes', 'id_groupe');
            $table->foreignId('id_module')->constrained('modules', 'id_module');
            $table->foreignId('id_user')->constrained('user', 'id_user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seances');
    }
}; 