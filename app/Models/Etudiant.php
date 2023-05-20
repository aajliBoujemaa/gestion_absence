<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seance;
use App\Models\Absence;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ["nom","prenom","age","cne","classe_id"];
    public function seances()
    {
        return $this->belongsToMany(Seance::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
