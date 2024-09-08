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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("telefone");
            $table->string("cpfcnpj");
            $table->string("logradouro");
            $table->string("bairro");
            $table->string("numero");
            $table->string("cidade");
            $table->string("cep");
            $table->string("estado");
            $table->date("datanasc")->nullable();
            $table->dateTime("ultimacompra")->nullable();
            $table->double("totalgasto")->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
