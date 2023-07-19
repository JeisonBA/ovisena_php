<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RebanoModel extends Model
{
    use HasFactory;
    protected $table = 'rebaño';

    public function alimentacion(){
        return $this->belongsTo('App\Models\AlimentacionModel', 'Nom_rebano', 'Nom_rebano');
    }

    public function ovino(){
        return $this->belongsTo('App\Models\OvinoModel', 'Id_ovino', 'Id_ovino');
    }
}