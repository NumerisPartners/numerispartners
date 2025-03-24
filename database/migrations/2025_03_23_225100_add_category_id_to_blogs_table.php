<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Vérifier d'abord si la table blog_categories existe
        if (!Schema::hasTable('blog_categories')) {
            // Si elle n'existe pas, on la crée
            Schema::create('blog_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        // Ensuite, on modifie la table blogs
        Schema::table('blogs', function (Blueprint $table) {
            // Si la colonne category_id n'existe pas, on l'ajoute
            if (!Schema::hasColumn('blogs', 'category_id')) {
                $table->foreignId('category_id')->after('user_id')->nullable();
            }

            // On essaie d'ajouter la contrainte de clé étrangère
            try {
                $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
            } catch (\Exception $e) {
                // Si la contrainte existe déjà ou s'il y a une autre erreur, on continue
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // On essaie de supprimer la contrainte de clé étrangère
            try {
                $table->dropForeign(['category_id']);
            } catch (\Exception $e) {
                // Si la contrainte n'existe pas ou s'il y a une autre erreur, on continue
            }
        });
    }
};
