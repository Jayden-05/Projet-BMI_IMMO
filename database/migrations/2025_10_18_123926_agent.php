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
        //creation de la table agent
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->string('nom_agent');
            $table->string('prenom_agent');
            $table->string('tel_agent')->unique();
            $table->string('email_agent')->unique();
            $table->string('zone_affectation');
            $table->string('type_agent');
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
