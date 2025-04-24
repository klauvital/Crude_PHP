<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    public $timestamps = false;

    protected $fillable = ['nome', 'descricao', 'valor'];

    public function campanhas()
    {
        return $this->belongsToMany(Campanha::class, 'campanha_produto_relacao', 'id_produto', 'id_campanha')
            ->withPivot('id_desconto')
            ->withTimestamps();
    }
}
