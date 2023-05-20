<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('layoutEtudiant.listEtudiant',compact("etudiants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view('layoutEtudiant.createEtudiant',compact("classes"));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "age"=>"required",
            "cne"=>"required",
            "classe_id"=>"required",
        ]);

        Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "age"=>$request->age,
            "cne"=>$request->cne,
            "classe_id"=>$request->classe_id,
        ]);
        return back()->with("success","Etudiant ajouter avec succè");
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
    public function delete(Etudiant $etudiant)
    {

        $nom_complet= $etudiant->nom." ".$etudiant->prenom;
        $etudiant->delete();
        return back()->with('successDelete',"L'Etudiant '$nom_complet' supprimé avec succè!!");
    }

    public function updat(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "age"=>"required",
            "cne"=>"required",
            "classe_id"=>"required",
        ]);

        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "age"=>$request->age,
            "cne"=>$request->cne,
            "classe_id"=>$request->classe_id,
        ]);
        return back()->with("success","Etudiant mis à jour avec succè");
    }

    public function edite(Etudiant $etudiant)
    {
        $classes = Classe::all();
        return view('layoutEtudiant.editEtudiant',compact("classes"));
    }


}
