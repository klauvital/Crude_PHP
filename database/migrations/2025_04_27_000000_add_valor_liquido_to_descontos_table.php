<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorLiquidoToDescontosTable extends Migration
{
    public function up()
    {
        Schema::table('descontos', function (Blueprint $table) {
            $table->decimal('valor_liquido', 15, 2)->nullable()->after('valor_desconto');
        });
    }

    public function down()
    {
        Schema::table('descontos', function (Blueprint $table) {
            $table->dropColumn('valor_liquido');
        });
    }
}
