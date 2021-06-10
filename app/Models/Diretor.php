<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diretor extends Model
{
    protected $table = 'diretor';

    protected $fillable = [
        'FK_idDiretor',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $with = ['professor'];
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/diretors/'.$this->getKey());
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'FK_idDiretor', 'id');
    }
}
