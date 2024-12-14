<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $primaryKey = 'id_groupe';
    protected $fillable = ['nom_groupe', 'niveau_id'];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'niveau_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_groupe');
    }
}
