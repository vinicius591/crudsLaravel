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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id(); // Cria o campo 'id' como INT, PRIMARY KEY e AUTO_INCREMENT
            $table->integer('numero_mesa')->unique(); // Cria o campo 'numero_mesa' como INT (adicionado o índice único comum para mesas)
            $table->integer('capacidade'); // Cria o campo 'capacidade' como INT
            $table->string('status', 20); // Cria o campo 'status' como VARCHAR(20)

            $table->timestamps(); // Mantém o padrão do Laravel (created_at e updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
    
};
