<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_filiere';
    protected $fillable = [
        'nom_filiere',
        'description'
    ];

    // Relationships
    public function niveaux()
    {
        return $this->hasMany(Niveau::class, 'id_filiere');
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class, 'id_filiere');
    }
}