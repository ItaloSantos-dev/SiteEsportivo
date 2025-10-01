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
        Schema::create('produto_vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venda_id');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('usuario_id');
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 10,2);
            $table->decimal('valor_final', 10,2);

            $table->foreign('venda_id')->references('id')->on('vendas')->delete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->delete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->delete('cascade');




            $table->unique(['venda_id', 'produto_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_vendas');
    }
};
