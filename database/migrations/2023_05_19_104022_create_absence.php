<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absence', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->foreignId("classe_id")->constrained("classes");
            $table->foreignId("enseignant_id")->constrained("enseignants");
            $table->foreignId("etudiant_id")->constrained("etudiants");
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absence');
    }
};
