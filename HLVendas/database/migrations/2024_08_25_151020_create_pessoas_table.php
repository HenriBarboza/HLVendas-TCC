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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("nfantasia")->nullable();
            $table->string("telefone");
            $table->string("cpfcnpj");
            $table->string("logradouro");
            $table->string("bairro");
            $table->string("numero");
            $table->string("cidade");
            $table->string("cep")->nullable();
            $table->string("estado");
            $table->date("datanasc");
            $table->string("tipo");
            $table->timestamps();
        }); {
            DB::unprepared('
            CREATE TRIGGER after_insert_pessoa
            AFTER INSERT ON pessoas
            FOR EACH ROW
            BEGIN
                -- Verifica se o tipo é "C" antes de inserir na tabela Cliente
                IF NEW.tipo = "C" THEN
                    INSERT INTO clientes (idpessoa)
                    VALUES (NEW.id);
                END IF;
            END
        ');
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
