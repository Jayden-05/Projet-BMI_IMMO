<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visite', function (Blueprint $table) {
            $table->id();

            // clés étrangères
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('bien_id');

            // infos de la visite
            $table->date('date_visite');
            $table->time('heure_visite');
            $table->string('statut_visite', 50);
            $table->decimal('montant_visite', 15, 2)->nullable();
            $table->string('moyen_paiement', 50);

            $table->timestamps();

            // contraintes de clé étrangère
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->foreign('bien_id')->references('id')->on('bien')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visite');
    }
};
