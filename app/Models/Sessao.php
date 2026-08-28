<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sessao extends Model
{
    use HasFactory;

    protected $table = 'sessoes';

    protected $fillable = [
        'filme_id',
        'sala',
        'data_sessao',
        'hora_inicio',
        'preco'
    ];

    public function filme()
    {
        return $this->belongsTo(Filme::class);
    }

    public function ingressos()
    {
        return $this->hasMany(Ingresso::class);
    }
}
