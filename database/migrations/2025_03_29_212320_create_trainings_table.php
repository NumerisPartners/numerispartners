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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->decimal('individual_price', 10, 2); // Prix pour les particuliers
            $table->decimal('company_price', 10, 2); // Prix pour les entreprises
            $table->string('duration'); // Durée de la formation (ex: "3 jours", "35 heures")
            $table->string('level')->default('débutant'); // Niveau (débutant, intermédiaire, avancé)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
