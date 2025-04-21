<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    public function campanhas()
    {
        return $this->belongsToMany(Campanha::class, 'campanha_produto_relacao', 'id_produto', 'id_campanha')
            ->withPivot('id_desconto')
            ->withTimestamps();
    }
}
