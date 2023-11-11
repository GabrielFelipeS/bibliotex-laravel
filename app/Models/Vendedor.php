<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedores';
    protected $fillable = [
        'cpf', 'nomeCompleto', 'data_de_nascimento', 'nacionalidade',
    ];

    use HasFactory;
}
