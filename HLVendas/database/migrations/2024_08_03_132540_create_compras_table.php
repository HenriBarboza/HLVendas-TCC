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
            $table->integer('fornecedorid');
            $table->integer('doc');
            $table->integer('contaid');
            $table->float('percdesconto')->nullable();
            $table->float('percadicional')->nullable();
            $table->float('totalcompra');
            $table->integer('funcionarioid');
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
