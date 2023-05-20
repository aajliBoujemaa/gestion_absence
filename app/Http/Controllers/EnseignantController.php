<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants = Enseignant::all();
        return view('layoutEnseignant.listEnseignant',compact("enseignants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view('layoutEnseignant.createEnseignant',compact("classes"));    }

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

        Enseignant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "age"=>$request->age,
            "cne"=>$request->cne,
            "classe_id"=>$request->classe_id,
        ]);
        return back()->with("success","enseignant ajouter avec succè");
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
    public function delete(Enseignant $enseignant)
    {

        $nom_complet= $enseignant->nom." ".$enseignant->prenom;
        $enseignant->delete();
        return back()->with('successDelete',"L'enseignant '$nom_complet' supprimé avec succè!!");
    }

    public function updat(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "age"=>"required",
            "cne"=>"required",
            "classe_id"=>"required",
        ]);

        $enseignant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "age"=>$request->age,
            "cne"=>$request->cne,
            "classe_id"=>$request->classe_id,
        ]);
        return back()->with("success","Enseignant mis à jour avec succè");
    }

    public function edite(Enseignant $enseignant)
    {
        $classes = Classe::all();
        return view('layoutEnseignant.editEnseignant',compact("enseignant","classes"));
     }
}
