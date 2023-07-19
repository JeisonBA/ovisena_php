<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaModel extends Model
{
    use HasFactory;
    protected $table = 'salida';

    // public function sanidad(){
    //     return $this->belongsTo('App\Models\SanidadModel', 'Id_sanidad', 'Id_sanidad');
    // }
}