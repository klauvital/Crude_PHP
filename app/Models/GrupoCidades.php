<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrupoCidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome_grupo'];

    public function relacoes()
    {
        return $this->hasMany(GrupoCidadeRelacao::class, 'id_grupo_cidades');
    }

    public function campanhas()
    {
        return $this->hasMany(Campanha::class, 'id_grupo_cidades');
    }
}
