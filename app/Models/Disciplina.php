<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome',
        'sigla',
        'numCreditos',
        'FK_idTurma',
        'FK_idProfessor',
        'local_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/disciplinas/'.$this->getKey());
    }
}
