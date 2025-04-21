<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desconto extends Model
{
    use HasFactory;

    protected $fillable = ['valor_desconto', 'percentual_desconto'];

    public function campanhaProdutoRelacoes()
    {
        return $this->hasMany(CampanhaProdutoRelacao::class, 'id_desconto');
    }
}
