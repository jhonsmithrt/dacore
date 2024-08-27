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
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->enum('ambiente',['DACORE','CENTRO'])->default('CENTRO');
            $table->foreignIdFor(\App\Models\Vendedor::class);
            $table->string('documento');
            $table->string('nombre');
            $table->float('monto');
            $table->date('fechaFacturacion')->nullable();
            $table->date('fechaVencimiento')->nullable();
            $table->float('nc');
            $table->string('viaje');
            $table->float('abono');
            $table->string('ruta');
            $table->enum('condicion',['contado','credito 7D', 'credito 15D', 'credito 30D'])->default('contado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditos');
    }
};
