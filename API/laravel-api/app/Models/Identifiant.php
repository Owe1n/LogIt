<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifiant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nom_identifiant',
        'mdp_identifiant'
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'identifiant_projets');
    }
}
