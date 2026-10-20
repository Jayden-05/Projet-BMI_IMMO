<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bien_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien_id');
            $table->string('image_path');
            $table->boolean('is_main')->default(false);
            $table->timestamps();

            $table->foreign('bien_id')->references('id')->on('bien')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bien_images');
    }
};
