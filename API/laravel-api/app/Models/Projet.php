<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nom_projet'
    ];

    public function identifiants()
    {
        return $this->belongsToMany(Identifiant::class, 'identifiant_projets');
    }
}
