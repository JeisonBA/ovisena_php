<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OvinoModel extends Model
{
    use HasFactory;
    protected $table = 'ovino';

    // public function responsable(){
    //     return $this->belongsTo('App\Models\ResponsableModel', 'Id_responsable', 'Id_responsable');
    // }

    // public function rebano(){
    //     return $this->belongsTo('App\Models\RebanoModel', 'Id_rebano', 'Id_rebano');
    // }

    public function sanidad()
    {
        return $this->belongsTo('App\Models\SanidadModel', 'Id_ovino', 'Id_ovino');
    }

    public function salida()
    {
        return $this->belongsTo('App\Models\SalidaModel', 'Id_ovino', 'Id_ovino');
    }

    public function pesaje()
    {
        return $this->belongsTo('App\Models\PesajeModel', 'Id_ovino', 'Id_ovino');
    }

    public function partoM()
    {
        return $this->belongsTo('App\Models\PartoModel', 'Id_ovino', 'Id_madre');
    }

    public function partoP()
    {
        return $this->belongsTo('App\Models\PartoModel', 'Id_ovino', 'Id_padre');
    }
}
