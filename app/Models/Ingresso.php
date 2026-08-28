<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingresso extends Model
{
    use HasFactory;

    protected $fillable = [
        'sessao_id',
        'cliente_nome',
        'assento',
        'tipo_ingresso'
    ];

    public function sessao()
    {
        return $this->belongsTo(Sessao::class);
    }
}
