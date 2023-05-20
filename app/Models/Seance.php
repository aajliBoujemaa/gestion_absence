<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Absence;

class Seance extends Model
{
    use HasFactory;
    protected $fillable = ["date_debut_Seance","date_fin_Seance","classe_id","enseignant_id"];
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
