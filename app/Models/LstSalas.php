<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LstSalas extends Model
{
    protected $table = 'lst_salas';
    protected $fillable = [
        'nome_blcoo',
        'capacidade',
        'num_salas',
    ];

}
