<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matiere;
use App\Models\Seance;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prenom","age","cne","classe_id"];
    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}
