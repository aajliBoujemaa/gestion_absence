<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $studentCount = Etudiant::count();
        $enseignantCount = Enseignant::count();
        $classeCount = Classe::count();
        $matiereCount = Matiere::count();
        $userCount = User::count();
        return view('home',compact("studentCount","enseignantCount","classeCount","matiereCount","userCount"));
    }

}
