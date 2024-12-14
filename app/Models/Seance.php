<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_de_seance',
        'id_module',
        'niveau_id',
        'id_groupe',
        'id_user'
    ];

    protected $casts = [
        'date_de_seance' => 'datetime'
    ];

    // Relationships
    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'niveau_id');
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_groupe');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'id_seance');
    }
} 