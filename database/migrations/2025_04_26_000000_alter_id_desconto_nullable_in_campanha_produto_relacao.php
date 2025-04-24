<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterIdDescontoNullableInCampanhaProdutoRelacao extends Migration
{
    public function up()
    {
        Schema::table('campanha_produto_relacao', function (Blueprint $table) {
            $table->unsignedBigInteger('id_desconto')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('campanha_produto_relacao', function (Blueprint $table) {
            $table->unsignedBigInteger('id_desconto')->nullable(false)->change();
        });
    }
}
