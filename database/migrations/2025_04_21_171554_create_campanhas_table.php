<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('campanhas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('nome_campanha', 50);
            $table->boolean('status')->default(false);
            $table->foreignId('id_grupo_cidades')->constrained('grupo_cidades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campanhas');
    }
};
