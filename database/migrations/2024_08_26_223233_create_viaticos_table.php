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
        Schema::create('viaticos', function (Blueprint $table) {
            $table->id();
            $table->text('ruta');
            $table->text('viaje');
            $table->integer('recibo');
            $table->dateTime('fechaReposicion')->nullable();
            $table->float('montoReposicion')->nullable();
            $table->float('monto');
            $table->foreignIdFor(\App\Models\Condutor::class);
            $table->enum('estado', ["liquidado","sin liquidar"])->default('sin liquidar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viaticos');
    }
};
