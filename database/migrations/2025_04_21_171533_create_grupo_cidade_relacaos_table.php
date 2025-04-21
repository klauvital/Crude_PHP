<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('grupo_cidade_relacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_grupo_cidades')->constrained('grupo_cidades')->onDelete('cascade');
            $table->foreignId('id_cidade')->constrained('cidades')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['id_grupo_cidades', 'id_cidade']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grupo_cidade_relacao');
    }
};
