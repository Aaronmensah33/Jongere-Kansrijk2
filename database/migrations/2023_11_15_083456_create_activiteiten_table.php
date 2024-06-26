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
        Schema::create('activiteiten', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('naam');
            $table->string('beschrijving');
            $table->string('locatie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activiteiten');
    }
};
