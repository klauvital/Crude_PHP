<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampanhaProdutoRelacao extends Model
{
    use HasFactory;

    protected $table = 'campanha_produto_relacao';

    protected $fillable = ['id_campanha', 'id_produto', 'id_desconto'];

    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'id_campanha');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    public function desconto()
    {
        return $this->belongsTo(Desconto::class, 'id_desconto');
    }
}
