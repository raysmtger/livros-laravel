<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('livros');
    }

    public function down(): void
    {
        // Aqui você pode criar a tabela novamente, se necessário
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('isbn');
            $table->string('editora');
            $table->integer('ano_publicacao');
            $table->timestamps();
        });
    }
};
