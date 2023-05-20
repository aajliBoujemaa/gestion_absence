<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filiere;
use App\Models\Enseignant;
use App\Models\Seance;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = ["nom_matiere","classe_id","enseignant_id"];
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
