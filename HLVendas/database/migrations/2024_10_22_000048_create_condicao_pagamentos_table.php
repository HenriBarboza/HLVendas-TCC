<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('condicao_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->integer('quantparcelas');
            $table->integer('diasparcelas');
            $table->boolean('alterarvalor');
            $table->timestamps();
        });

        DB::table('condicao_pagamentos')->insert(
            [
                [
                    'descricao' => 'Dinheiro',
                    'quantparcelas' => 1,
                    'diasparcelas' => 0,
                    'alterarvalor' => true,
                ],
                [
                    'descricao' => 'Cartão',
                    'quantparcelas' => 1,
                    'diasparcelas' => 30,
                    'alterarvalor' => false,
                ],
                [
                    'descricao' => 'Cartão 3x',
                    'quantparcelas' => 3,
                    'diasparcelas' => 30,
                    'alterarvalor' => false,
                ],
                [
                    'descricao' => 'PIX',
                    'quantparcelas' => 1,
                    'diasparcelas' => 0,
                    'alterarvalor' => false,
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condicao_pagamentos');
    }
};
