<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';

    protected $fillable = [
        'nome',
        'nascimento',
        'telefone',
        'faltas',
        'cra',
        'FK_idTurma',
        'FK_idOrientador',
    
    ];
    
    
    protected $dates = [
        'nascimento',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/alunos/'.$this->getKey());
    }
}
