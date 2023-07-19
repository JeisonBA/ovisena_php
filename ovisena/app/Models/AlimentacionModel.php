<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentacionModel extends Model
{
    use HasFactory;
    protected $table = 'alimentacion';

    // public function rebano(){
    //     return $this->belongsTo('App\Models\RebanoModel', 'Id_rebano', 'Id_rebano');
    // }
}