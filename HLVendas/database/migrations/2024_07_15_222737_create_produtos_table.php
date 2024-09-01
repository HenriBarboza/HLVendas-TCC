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
            $table->string("descricao");
            $table->float("custo");
            $table->float("perccusto");
            $table->float("precoavista");
            $table->float("percprazo");
            $table->float("precoaprazo")->nullable();
            $table->string("unidade");
            $table->integer("codigoBarras")->nullable();
            $table->string("categoria")->nullable();
            $table->dateTime("ultimavenda")->nullable();
            $table->dateTime("ultimacompra")->nullable();
            $table->float("estoque")->default(0)->nullable();
            $table->timestamps();
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
