<?php

use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatiereController;

use App\Http\Controllers\SeanceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//etudiant
Route::get("/etudiant",[EtudianController::class,"index"])->name("etudiant");

Route::get("/createEtudiant",[EtudianController::class,"create"])->name("etudiant.create");
Route::post("/ajouterEtudiant",[EtudianController::class,"store"])->name("ajouterEtudiant");
Route::get("/editEtudiant/{etudiant}",[EtudianController::class,"edite"])->name("etudiant.edit");
Route::put("/updateEtudiant/{etudiant}",[EtudianController::class,"updat"])->name("updateEtudiant");
Route::delete("/supprimerEtudiant/{etudiant}",[EtudianController::class,"delete"])->name("supprimerEtudiant");

//enseignant
Route::get("/enseignant",[EnseignantController::class,"index"])->name("enseignant");

Route::get("/createEnseignant",[EnseignantController::class,"create"])->name("enseignant.create");
Route::post("/ajouterEnseignant",[EnseignantController::class,"store"])->name("ajouterEnseignant");
Route::get("/editEnseignant/{enseignant}",[EnseignantController::class,"edite"])->name("enseignant.edit");
Route::put("/updateEnseignant/{enseignant}",[EnseignantController::class,"updat"])->name("updateEnseignant");
Route::delete("/supprimerEnseignant/{enseignant}",[EnseignantController::class,"delete"])->name("supprimerEnseignant");

// Seance
Route::get("/seance",[SeanceController::class,"index"])->name("seance");

Route::get("/createSeance",[SeanceController::class,"create"])->name("seance.create");
Route::post("/ajouterSeance",[SeanceController::class,"store"])->name("ajouterSeance");
Route::get("/editSeance/{seance}",[SeanceController::class,"edite"])->name("seance.edit");
Route::put("/updateSeance/{seance}",[SeanceController::class,"updat"])->name("updateSeance");
Route::delete("/supprimerSeance/{seance}",[SeanceController::class,"delete"])->name("supprimerSeance");

//Matiere

Route::get("/matiere",[MatiereController::class,"index"])->name("matiere");

Route::get("/createMatiere",[MatiereController::class,"create"])->name("matiere.create");
Route::post("/ajouterMatiere",[MatiereController::class,"store"])->name("ajouterMatiere");
Route::get("/editMatiere/{matiere}",[MatiereController::class,"edite"])->name("matiere.edit");
Route::put("/updateMatiere/{matiere}",[MatiereController::class,"updat"])->name("updateMatiere");
Route::delete("/supprimerMatiere/{matiere}",[MatiereController::class,"delete"])->name("supprimerMatiere");

//absence
Route::get("/absence",[AbsenceController::class,"index"])->name("absence");

//Role
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
});

Route::middleware(['auth', 'role:Étudiant'])->group(function () {
    Route::get('/profil', 'StudentController@profile')->name('student.profile');
});

Route::middleware(['auth', 'role:Enseignant'])->group(function () {
    Route::get('/cours', 'TeacherController@courses')->name('teacher.courses');
});
