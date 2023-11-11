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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->string('cpfDono');
            $table->foreign('cpfDono')->references('cpf')->on('vendedores');
            $table->string('bairro', 40);
            $table->string('endereco', 40);
            $table->string('cidade', 40);
            $table->string('estado', 40);
            $table->string('cep', 40);
            $table->string('complemento', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
