<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    // Colonnes pouvant être remplies via des formulaires ou des méthodes create/update
    protected $fillable = [
        'nom', // Ajouté
        'prenom', // Ajouté
        'email',
        'password',
        'role',
        'date_naissance',
        'ville',
        'id_groupe'
    ];

    // Colonnes cachées (par exemple, pour ne pas apparaître dans les JSON)
    protected $hidden = [
        'password'
    ];

    // Relations
    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_groupe');
    }

    public function seances()
    {
        return $this->hasMany(Seance::class, 'id_user');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'id_user');
    }
}