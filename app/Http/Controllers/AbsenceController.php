<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $absences = Absence::query()
            ->where('etudiant_id', 'LIKE', "%{$search}%")
            ->get();

        return view('layoutAbsence.listAbsence', compact('absences'));
    }


}
