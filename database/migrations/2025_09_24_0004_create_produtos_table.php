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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('subcategoria_id');//ex: whey ou hipercalórico da categoria nutrição
            $table->text('imagem');
            $table->text('desc');
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas')->delete('cascade');
            $table->foreign('subcategoria_id')->references('id')->on('categorias')->delete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
