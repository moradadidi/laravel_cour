<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $table = 'groupes';

    protected $fillable = [
        'nom',
        'description',
        'owner_id',
    ];

    public function owner() {
        return $this->belongsTo(Stagiaire::class, 'owner_id');
    }
}
