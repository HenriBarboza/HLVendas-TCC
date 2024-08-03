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
            $table->string("nfantasia");
            $table->string("telefone")->nullable();
            $table->string("celular");
            $table->string("cpfcnpj");
            $table->string("rgi")->nullable();
            $table->string("logradouro");
            $table->string("bairro");
            $table->string("numero");
            $table->string("cidade");
            $table->string("cep");
            $table->string("estado");
            $table->string("pais");
            $table->date("datanasc");
            $table->string("tipo");
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
