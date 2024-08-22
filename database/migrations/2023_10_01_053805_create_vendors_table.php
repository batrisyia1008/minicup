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
        /*Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('vendors');
        Schema::enableForeignKeyConstraints();*/

        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('roc_rob');
            $table->string('pic_name');
            $table->string('phone_num');
            $table->string('email');
            $table->longText('social_media')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
