<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Absence;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\Matiere;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            //$this->call(ClasseSeeder::class);
            //Etudiant::factory(29)->create();
            //Enseignant::factory(29)->create();
            //Matiere::factory(10)->create();
            Absence::factory(10)->create();

    }
}
