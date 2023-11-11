<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome', 'Testando', 'nascimento', 'telefone','email', 'senha',  'fotoPerfil',
    ];
    use HasFactory;
}
