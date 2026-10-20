<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proprietaire', function (Blueprint $table) {
            $table->id();
            $table->string('nom_proprio');
            $table->string('prenom_proprio');
            $table->string('tel_proprio')->unique();
            $table->string('email_proprio')->unique();
            $table->string('adresse_proprio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
