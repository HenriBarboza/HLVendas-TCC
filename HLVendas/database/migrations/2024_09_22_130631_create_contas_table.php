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
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->double('total')->nullable();
            $table->integer('funcionarioid');
            $table->timestamps();
        });
        DB::table(table: 'contas')->insert(
            [
                'nome' => 'Caixa',
                'total' => 0.0,
                'funcionarioid' => '1',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas');
    }
};
