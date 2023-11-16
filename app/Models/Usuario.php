<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nome', 'nascimento', 'telefone','email', 'senha',  'fotoPerfil',
    ];
    use HasFactory;
}
