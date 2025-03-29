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
        Schema::create('training_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('location'); // Lieu de la formation (en ligne, présentiel, etc.)
            $table->string('address')->nullable(); // Adresse si présentiel
            $table->integer('max_participants')->default(10); // Nombre maximum de participants
            $table->integer('available_seats')->default(10); // Places disponibles
            $table->boolean('is_confirmed')->default(false); // Session confirmée ou non
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_sessions');
    }
};
