<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNomeAndDescricaoInProdutosTable extends Migration
{
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('nome', 300)->change();
            $table->string('descricao', 600)->change();
        });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('nome', 50)->change(); // supondo que antes era 100
            $table->string('descricao', 200)->change(); // supondo que antes era 255
        });
    }
}
