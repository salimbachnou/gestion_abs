<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = ['nom_niveau', 'id_filiere'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class, 'niveau_id');
    }
} 