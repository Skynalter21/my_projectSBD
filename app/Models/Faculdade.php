<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculdade extends Model
{
    protected $table = 'faculdade';

    protected $fillable = [
        'nome',
        'sigla',
        'bloco',
        'numAlunos',
        'numProfessor',
        'orcamento',
        'FK_idUniversidade',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $with = ['universidade'];
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/faculdades/'.$this->getKey());
    }

    public function universidade()
    {
        return $this->belongsTo(Universidade::class, 'FK_idUniversidade', 'id');
    }
}
