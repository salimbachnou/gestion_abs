<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'rss', 'enseignant', 'etudiant']);
            $table->date('date_naissance');
            $table->string('ville');
            $table->foreignId('id_groupe')->nullable()->constrained('groupes', 'id_groupe');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
};