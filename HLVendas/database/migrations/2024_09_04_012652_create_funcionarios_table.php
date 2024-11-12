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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("email");
            $table->string("telefone");
            $table->string("cpfcnpj");
            $table->string("logradouro")->nullable();
            $table->string("bairro")->nullable();
            $table->string("numero")->nullable();
            $table->string("cidade")->nullable();
            $table->string("cep")->nullable();
            $table->string("estado")->nullable();
            $table->date("datanasc")->nullable();
            $table->string("tipo");
            $table->foreignId("idauth");
            $table->timestamps();

            $table->foreign('idauth')->references('id')->on('users')->onDelete('cascade');
        });
        DB::table(table: 'funcionarios')->insert(
            [
                'nome' => 'Admin',
                'email' => 'admin@email.com',
                'telefone' => '000000000',
                'cpfcnpj' => '000000000',
                'tipo' => 'g',
                'idauth' => '1',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
