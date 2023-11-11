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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('cpfComprador', 13);
            $table->string('ISBNLivro', 15);
            $table->integer('codVendedor');
            $table->double('valor');
            $table->string('cartao  ');

            $table->foreign('ISBNLivro')->references('ISBN')->on('livros');
            $table->foreign('codVendedor')->references('codigo_vendedor')->on('vendedores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
