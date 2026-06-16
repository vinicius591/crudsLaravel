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
            Schema::create('pedidos', function (Blueprint $table) {
                $table->id(); // Cria o campo 'id' como INT, AUTO_INCREMENT e Chave Primária
                $table->integer('mesa'); // Cria o campo 'mesa' como INT
                $table->string('item'); // Cria o campo 'item' como VARCHAR(255)
                $table->string('status'); // Cria o campo 'status' como VARCHAR(255)
                
                // Se você quiser manter os campos criados_em / atualizados_em do Laravel, 
                // basta descomentar a linha abaixo:
                // $table->timestamps(); 
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
