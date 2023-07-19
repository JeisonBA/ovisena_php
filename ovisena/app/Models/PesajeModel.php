<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesajeModel extends Model
{
    use HasFactory;
    protected $table = 'pesaje';

    // public function ovino(){
    //     return $this->belongsTo('App\Models\OvinoModel', 'Id_ovino', 'Id_ovino');
    // }

    public function responsable(){
        return $this->belongsTo('App\Models\ResponsableModel', 'Id_responsable', 'Id_responsable');
    }
}