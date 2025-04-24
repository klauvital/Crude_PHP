<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('descontos', function (Blueprint $table) {
            $table->unsignedBigInteger('campanha_id')->nullable()->after('id');
            $table->float('valor_total')->nullable()->after('percentual_desconto');

            $table->foreign('campanha_id')->references('id')->on('campanhas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('descontos', function (Blueprint $table) {
            $table->dropForeign(['campanha_id']);
            $table->dropColumn(['campanha_id', 'valor_total']);
        });
    }
};
