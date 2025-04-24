<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desconto extends Model
{
    use HasFactory;

    protected $fillable = ['campanha_id', 'valor_total', 'valor_desconto', 'percentual_desconto', 'valor_liquido'];


    public function campanhaProdutoRelacoes()
    {
        return $this->hasMany(CampanhaProdutoRelacao::class, 'id_desconto');
    }

    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'campanha_id');
    }
}
