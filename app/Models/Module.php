<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_module';

    protected $fillable = [
        'nom_module',
        'description',
        'date_creation'
    ];

    protected $casts = [
        'date_creation' => 'date'
    ];

    // Relationships
    public function seances()
    {
        return $this->hasMany(Seance::class, 'id_module');
    }

    public function niveaux()
    {
        return $this->belongsToMany(Niveau::class, 'niveau_module', 'id_module', 'niveau_id');
    }
} 