<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type');
            $table->string('chemin');
            $table->unsignedBigInteger('id_projet')->nullable();
            $table->unsignedBigInteger('id_contrat')->nullable();
            $table->unsignedBigInteger('id_facture')->nullable();
            $table->timestamps();

            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
            $table->foreign('id_contrat')->references('id')->on('contrat')->onDelete('cascade');
            $table->foreign('id_facture')->references('id')->on('facture')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('document');
    }
};
