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
        Schema::table('racing_categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('id');
        });

        Schema::table('racing_tracks', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racing_categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('racing_tracks', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
