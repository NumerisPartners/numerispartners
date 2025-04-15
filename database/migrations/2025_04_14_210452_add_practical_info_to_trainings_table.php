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
        Schema::table('trainings', function (Blueprint $table) {
            $table->text('target_audience')->nullable()->after('content');
            $table->text('prerequisites')->nullable()->after('target_audience');
            $table->text('teaching_methods')->nullable()->after('prerequisites');
            $table->text('evaluation_methods')->nullable()->after('teaching_methods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn([
                'target_audience',
                'prerequisites',
                'teaching_methods',
                'evaluation_methods'
            ]);
        });
    }
};
