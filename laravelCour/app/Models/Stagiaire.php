<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $table = 'stagiaires';
    protected $fillable = ['nom', 'prenom', 'email', 'telephone', 'adresse'];

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'stagiaire_groupe', 'stagiaire_id', 'groupe_id');
    }
}