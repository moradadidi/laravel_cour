<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupesTable extends Migration
{
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Assuming 'name' is a property of the groupe
            $table->text('description')->nullable(); // Optional description field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groupes');
    }
}