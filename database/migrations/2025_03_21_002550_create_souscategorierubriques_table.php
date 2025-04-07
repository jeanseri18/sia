<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousCategorierubriquesTable extends Migration
{
    public function up()
    {
        Schema::create('souscategorierubriques', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de la sous-session
            $table->unsignedBigInteger('id_session'); // Clé étrangère vers sessions
            $table->string('type'); // Type de la sous-session
            $table->timestamps();

            // Définition de la clé étrangère
            $table->foreign('id_session')->references('id')->on('categorierubriques')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('souscategorierubriques');
    }
}
