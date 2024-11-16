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
        Schema::create('movimento_estoques', function (Blueprint $table) {
            $table->id();
            $table->string('motivo');
            $table->integer('produtoid');
            $table->float('quantidade');
            $table->string('observacao');
            $table->string('tipomovimentacao')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimento_estoques');
    }
};
