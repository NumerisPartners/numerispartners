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
        Schema::table('training_sessions', function (Blueprint $table) {
            $table->string('title')->after('training_id')->nullable(); // Titre de la session
            $table->string('reference')->after('title')->nullable(); // Référence de la session
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_sessions', function (Blueprint $table) {
            $table->dropColumn(['title', 'reference']);
        });
    }
};
