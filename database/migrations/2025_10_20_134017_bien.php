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
        //create table 'bien'
        Schema::create('bien', function (Blueprint $table) {
            $table->id();
            $table->string('type_bien');
            $table->string('adresse_bien');
            $table->integer('superficie'); // in square meters
            $table->decimal('prix', 15, 2); // price with 2 decimal places
            $table->string('statut'); // e.g., 'available', 'sold', 'rented'
            $table->text('description')->nullable();

            $table->unsignedBigInteger('id_proprio');

            $table->timestamps();

            $table->foreign('id_proprio')->references('id')->on('proprietaire')->onDelete('cascade');
        });
        Schema::table('bien', function (Blueprint $table) {
        $table->string('slug')->unique()->after('type_bien');
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
