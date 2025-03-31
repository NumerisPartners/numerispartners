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

        // Mettre à jour les enregistrements existants avec des valeurs par défaut
        $sessions = \DB::table('training_sessions')->get();
        foreach ($sessions as $session) {
            $training = \DB::table('trainings')->where('id', $session->training_id)->first();
            $title = $training ? $training->title . ' - Session ' . $session->id : 'Session ' . $session->id;
            $reference = 'REF-' . str_pad($session->id, 5, '0', STR_PAD_LEFT);
            
            \DB::table('training_sessions')
                ->where('id', $session->id)
                ->update([
                    'title' => $title,
                    'reference' => $reference
                ]);
        }

        // Maintenant que tous les enregistrements ont des valeurs, on peut rendre les colonnes obligatoires
        Schema::table('training_sessions', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
            $table->string('reference')->unique()->nullable(false)->change();
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
