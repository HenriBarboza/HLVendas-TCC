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
            $table->integer('clienteid');
            $table->integer('doc');
            $table->integer('contaid');
            $table->integer('condicaopagid')->nullable();
            $table->string('tabelapreco');
            $table->float('percdesconto')->nullable();
            $table->float('percadicional')->nullable();
            $table->float('totalvenda');
            $table->integer('funcionarioid');
            $table->timestamps();
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
