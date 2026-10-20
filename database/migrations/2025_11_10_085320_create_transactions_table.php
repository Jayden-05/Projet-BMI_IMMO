<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visite_id')->constrained('visite')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade');
            $table->foreignId('bien_id')->constrained('bien')->onDelete('cascade');
            $table->decimal('montant', 10, 2);
            $table->string('moyen_paiement');
            $table->string('statut_transaction')->default('En attente'); // En attente, Payé, Échoué
            $table->string('reference_transaction')->unique();
            $table->date('date_transaction');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
