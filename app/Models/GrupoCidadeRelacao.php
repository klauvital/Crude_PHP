<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrupoCidadeRelacao extends Model
{
    use HasFactory;

    protected $table = 'grupo_cidade_relacao';

    protected $fillable = ['id_grupo_cidades', 'id_cidade'];

    public function grupoCidades()
    {
        return $this->belongsTo(GrupoCidade::class, 'id_grupo_cidades');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'id_cidade');
    }
}
