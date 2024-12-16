<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Specify the table name if it does not follow Laravel's naming convention
    protected $table = 'user';

    // Primary key for the table
    protected $primaryKey = 'id_user';

    // Indicates if the IDs are auto-incrementing
    public $incrementing = true;

    // The "type" of the auto-incrementing ID
    protected $keyType = 'int';

    // Mass assignable attributes
    protected $fillable = [
        'email',
        'password',
        'role',
        'date_naissance',
        'ville',
        'id_groupe',
    ];

    // Hidden attributes for arrays (e.g., password, remember_token)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Attribute casting
    protected $casts = [
        'date_naissance' => 'date',
    ];

    // Define relationship to the 'groupes' table
    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_groupe', 'id_groupe');
    }
}