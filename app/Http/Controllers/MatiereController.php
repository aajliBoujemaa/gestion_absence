<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Matiere::all();
        return view('layoutMatiere.listMatiere',compact("matieres"));
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
        return view('layoutMatiere.createMatiere',compact("classes","enseignants"));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom_matiere"=>"required",
            "classe_id"=>"required",
            "enseignant_id"=>"required",
        ]);

        Matiere::create([
            "nom_matiere"=>$request->nom_matiere,
            "classe_id"=>$request->classe_id,
            "enseignant_id"=>$request->enseignant_id,
        ]);
        return back()->with("success","Matiere ajouter avec succè");
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
    public function delete(Matiere $matiere)
    {

        $nom_matiere= $matiere->nom_matiere;
        $matiere->delete();
        return back()->with('successDelete',"Matiere '$nom_matiere' supprimé avec succè!!");
    }

    public function updat(Request $request, Matiere $matiere)
    {
        $request->validate([
            "nom_matiere"=>"required",
            "classe_id"=>"required",
            "enseignant_id"=>"required",
        ]);

        $matiere->update([
            "nom_matiere"=>$request->nom_matiere,
            "classe_id"=>$request->classe_id,
            "enseignant_id"=>$request->enseignant_id,
        ]);
        return back()->with("success","Matiere mis à jour avec succè");
    }

    public function edite(Matiere $matiere)
    {
        $classes = Classe::all();
        $enseignants = Enseignant::all();
        return view('layoutMatiere.editMatiere',compact("enseignants","classes"));
     }
}
