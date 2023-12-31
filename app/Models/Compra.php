<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'cpfComprador', 'iSBNLivro', 'codVendedor', 'valor', 'Cartao',
    ];

    public function livro() {
        return $this->belongsTo(Livro::class, 'ISBNLivro')->withDefault();
    }   
}
