<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campanha extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'nome_campanha', 'status', 'id_grupo_cidades'];

    public function grupoCidade()
    {
        return $this->belongsTo(GrupoCidade::class, 'id_grupo_cidades');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'campanha_produto_relacao', 'id_campanha', 'id_produto')
            ->withPivot('id_desconto')
            ->withTimestamps();
    }
    public function campanhaProdutoRelacoes()
    {
        return $this->hasMany(CampanhaProdutoRelacao::class, 'id_campanha');
    }

    // Se quiser acessar diretamente os produtos:
  
}
