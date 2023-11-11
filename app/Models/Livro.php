<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'ISBN', 'valorLivro', 'nomeLivro', 'descricao', 'nomeDaFoto',
        // Adicione outros campos que você deseja permitir em mass assignment
    ];
}
