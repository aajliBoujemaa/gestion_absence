<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seance;
use App\Models\Etudiant;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = ["date_debut_Seance","date_fin_Seance","classe_id","enseignant_id"];

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
