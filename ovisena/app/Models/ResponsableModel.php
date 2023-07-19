<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableModel extends Model
{
    use HasFactory;
    protected $table = 'responsable';

    public function ovino(){
        return $this->belongsTo('App\Models\OvinoModel', 'Id_responsable', 'Id_responsable');
    }

    public function pesaje()
    {
        return $this->belongsTo('App\Models\PesajeModel', 'Id_responsable', 'Id_responsable');
    }

    public function sanidad()
    {
        return $this->belongsTo('App\Models\SanidadModel', 'Id_responsable', 'Id_responsable');
    }

    public function alimentacion()
    {
        return $this->belongsTo('App\Models\AlimentacionModel', 'Id_responsable', 'Id_responsable');
    }
}