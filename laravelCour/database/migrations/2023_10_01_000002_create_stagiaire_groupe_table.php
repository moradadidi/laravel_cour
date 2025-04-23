<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiaireGroupeTable extends Migration
{
    public function up()
    {
        Schema::create('stagiaire_groupe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stagiaire_id')->constrained('stagiaires')->onDelete('cascade');
            $table->foreignId('groupe_id')->constrained('groupes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stagiaire_groupe');
    }
}