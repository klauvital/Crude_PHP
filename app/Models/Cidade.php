<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'id_estado'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function grupoCidadeRelacao()
    {
        return $this->hasOne(GrupoCidadeRelacao::class, 'id_cidade');
    }
}
