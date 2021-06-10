<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreRequisito extends Model
{
    protected $fillable = [
        'FK_idDisciplina',
        'pre_requisito',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pre-requisitos/'.$this->getKey());
    }
}
