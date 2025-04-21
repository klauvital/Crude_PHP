<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('descontos', function (Blueprint $table) {
            $table->id();
            $table->float('valor_desconto')->nullable();
            $table->float('percentual_desconto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('descontos');
    }
};
