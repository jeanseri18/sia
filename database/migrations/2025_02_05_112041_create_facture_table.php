<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('facture', function (Blueprint $table) {
            $table->id();
            $table->string('num')->unique();
            $table->unsignedBigInteger('id_prestation')->nullable();
            $table->unsignedBigInteger('id_contrat')->nullable();
            $table->unsignedBigInteger('id_artisan')->nullable();
            $table->decimal('montant', 10, 2);
            $table->decimal('decompte', 10, 2)->default(0);
            $table->decimal('retenue', 10, 2)->default(0);
            $table->date('date_emission');
            $table->enum('statut', ['en attente', 'payée', 'annulée'])->default('en attente');
        
            $table->foreign('id_prestation')->references('id')->on('prestation')->onDelete('cascade');
            $table->foreign('id_contrat')->references('id')->on('contrat')->onDelete('cascade');
            $table->foreign('id_artisan')->references('id')->on('artisan')->onDelete('cascade');
        });
        
    }

    public function down() {
        Schema::dropIfExists('facture');
    }
};
