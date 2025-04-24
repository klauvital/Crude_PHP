<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desconto extends Model
{
    use HasFactory;

    protected $fillable = [
        'campanha_id', // Adicione isso também no banco e no fillable
        'valor_total',
        'valor_desconto',
        'percentual_desconto',
        'valor_liquido'
    ];

    // Relacionamento direto com a campanha
    public function campanha()
    {
        return $this->belongsTo(Campanha::class, 'campanha_id');
    }
}
