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
        Schema::create('pieces', function (Blueprint $table) {
            $table->id('idpiece');
            $table->string('numpiece', 50)->unique();
            $table->date('dateemission');
            // Solution: Utiliser DB::raw pour l'enum avec apostrophe échappée
            $table->enum('typepiece', [
                'CNI',
                'Passeport',
                'Permis de conduire',
                'Carte consulaire',
                'Attestation identite'  // Sans apostrophe
            ]);
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            // Clé étrangère
            $table->foreign('client_id')
                  ->references('id')
                  ->on('client')
                  ->onDelete('cascade');

            // Index pour améliorer les performances
            $table->index('client_id');
            $table->index('numpiece');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieces');
    }
};
