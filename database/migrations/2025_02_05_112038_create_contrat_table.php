<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('contrat', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('id_artisan');
            $table->decimal('montant', 10, 2);
            $table->date('date_signature');
            $table->enum('statut', ['en cours', 'terminé', 'résilié'])->default('en cours');
            $table->timestamps();

            $table->foreign('id_artisan')->references('id')->on('artisan')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('contrat');
    }
};
