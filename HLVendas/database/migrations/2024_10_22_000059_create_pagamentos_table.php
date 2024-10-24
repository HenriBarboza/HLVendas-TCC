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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->integer('vendaid');
            $table->integer('numerotransacao')->nullable();
            $table->double('valorvenda');
            $table->double('valorpago');
            $table->string('tabelapreco');
            $table->date('databaixa');
            $table->integer('condicaopagid');
            $table->double('trocovenda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
