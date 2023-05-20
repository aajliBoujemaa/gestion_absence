<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seances = Seance::all();
        return view('layoutSeance.listSeance',compact("seances"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        $enseignants = Enseignant::all();
        return view('layoutSeance.createSeance',compact("classes","enseignants"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "date_debut_Seance"=>"required",
            "date_fin_Seance"=>"required",
            "classe_id"=>"required",
            "enseignant_id"=>"required",
        ]);

        Seance::create([
            "date_debut_Seance"=>$request->date_debut_Seance,
            "date_fin_Seance"=>$request->date_fin_Seance,
            "classe_id"=>$request->classe_id,
            "enseignant_id"=>$request->enseignant_id,
        ]);
        return back()->with("success","Seance ajouter avec succè");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Seance $seance)
    {

        $seanceid= $seance->id;
        $seance->delete();
        return back()->with('successDelete',"La seance '$seanceid' supprimé avec succè!!");
    }

    public function updat(Request $request, Seance $seance)
    {
        $request->validate([
            "date_debut_Seance"=>"required",
            "date_fin_Seance"=>"required",
            "classe_id"=>"required",
            "enseignant_id"=>"required",
        ]);

        $seance->update([
            "date_debut_Seance"=>$request->date_debut_Seance,
            "date_fin_Seance"=>$request->date_fin_Seance,
            "classe_id"=>$request->classe_id,
            "enseignant_id"=>$request->enseignant_id,
        ]);
        return back()->with("success","La seance mis à jour avec succè");
    }

    public function edite(Seance $seance)
    {
        $classes = Classe::all();
        $enseignants = Enseignant::all();
        return view('layoutSeance.editSeance',compact("enseignants","classes"));
     }
}
