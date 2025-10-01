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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_final', 10,2);
            $table->unsignedBigInteger('usuario_id');
            $table->enum('forma', ['dinheiro', 'debito', 'pix','credito'])->default('pix');
            $table->date('data');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->delete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
