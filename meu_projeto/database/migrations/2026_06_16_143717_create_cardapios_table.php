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
        Schema::create('cardapio', function (Blueprint $table) {
            $table->id(); // Cria o campo 'id' como INT, PRIMARY KEY e AUTO_INCREMENT
            $table->string('nome', 255); // Cria o campo 'nome' como VARCHAR(255)
            $table->integer('preco'); // Cria o campo 'preco' como INT
            $table->string('disponivel', 255); // Cria o campo 'disponivel' como VARCHAR(255)
            
            // Se você quiser manter o padrão do Laravel com os campos 'created_at' e 'updated_at'
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardapios');
    }
};
