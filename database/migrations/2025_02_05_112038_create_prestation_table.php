<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('prestation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_artisan');
            $table->unsignedBigInteger('id_contrat');
            $table->decimal('montant', 10, 2);
            $table->decimal('taux_avancement', 5, 2)->default(0);
            $table->enum('statut', ['en cours', 'terminée', 'annulée'])->default('en cours');
            $table->timestamps();

            $table->foreign('id_artisan')->references('id')->on('artisan')->onDelete('cascade');
            $table->foreign('id_contrat')->references('id')->on('contrat')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('prestation');
    }
};
