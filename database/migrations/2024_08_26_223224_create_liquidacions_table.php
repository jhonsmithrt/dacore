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
        Schema::create('liquidacions', function (Blueprint $table) {
            $table->id();
            $table->json('viajes');
            $table->json('depositos');
            $table->text('rutas');
            $table->text('total');
            $table->text('resultado');
            $table->enum('estado', ['pendiente', 'pagado'])->default('pendiente');
            $table->foreignIdFor(\App\Models\Condutor::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liquidacions');
    }
};
