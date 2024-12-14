<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'seance_id',
        'etudiant_id',
        'justification',
        'date_absence',
    ];

    // Relationship with Seance
    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    // Relationship with Etudiant (assuming you'll create this model later)
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
} 