<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("classes")->insert([
            ["nom_classe"=>"SDDI1"],
            ["nom_classe"=>"SDDI2"],
            ["nom_classe"=>"SDDI3"],
            ["nom_classe"=>"SDDI4"],
            ["nom_classe"=>"SDDI5"],
            ["nom_classe"=>"GC"],
            ["nom_classe"=>"GI"],
            ["nom_classe"=>"SRDI"],
            ["nom_classe"=>"CP"],
        ]);
    }
}
