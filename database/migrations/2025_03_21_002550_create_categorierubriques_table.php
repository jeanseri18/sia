<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorierubriquesTable extends Migration
{
    public function up()
    {
        Schema::create('categorierubriques', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de la session
            $table->string('type'); // Type de la session
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorierubriques');
    }
}
