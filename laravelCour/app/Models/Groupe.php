<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $table = 'groupes';
    protected $fillable = ['name', 'description'];

    public function stagiaires()
    {
        return $this->belongsToMany(Stagiaire::class, 'stagiaire_groupe', 'groupe_id', 'stagiaire_id');
    }
}