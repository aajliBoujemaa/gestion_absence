<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::all();
        return view('layoutClasse.listClasse',compact("classes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view('layoutClasse.createClasse',compact("classes"));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom_classe"=>"required",
        ]);

        Etudiant::create([
            "nom_classe"=>$request->nom_classe,
        ]);
        return back()->with("success","Classe ajouter avec succè");
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
    public function delete(Classe $classe)
    {

        $nom_complet= $classe->nom_classe;
        $classe->delete();
        return back()->with('successDelete',"L'Classe '$nom_complet' supprimé avec succè!!");
    }

    public function updat(Request $request, Classe $classe)
    {
        $request->validate([
            "nom_classe"=>"required",
        ]);

        $classe->update([
            "nom_classe"=>$request->nom_classe,
        ]);
        return back()->with("success","Classe mis à jour avec succè");
    }

    public function edite(Classe $classe)
    {
        $classes = Classe::all();
        return view('layoutClasse.editClasse',compact("classes"));
    }


}
