<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade');
            $table->foreignId('bien_id')->constrained('bien')->onDelete('cascade');
            $table->decimal('montant_loyer', 10, 2);
            $table->string('type_paiement'); // Mensuel, Trimestriel, Annuel
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('statut_paiement')->default('En cours'); // En cours, Payé, En retard
            $table->string('moyen_paiement');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paiements');
    }
};
