<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('campanha_produto_relacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_campanha')->constrained('campanhas')->onDelete('cascade');
            $table->foreignId('id_produto')->constrained('produtos')->onDelete('cascade');
            $table->foreignId('id_desconto')->constrained('descontos')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['id_campanha', 'id_produto', 'id_desconto'], 'camp_prod_rel_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campanha_produto_relacao');
    }
};
