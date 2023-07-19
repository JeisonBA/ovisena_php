<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanidadModel extends Model
{
    use HasFactory;
    protected $table = 'sanidad';

    public function rebano(){
        return $this->belongsTo('App\Models\RebanoModel', 'Id_rebano', 'Id_rebano');
    }

    public function ovino(){
        return $this->belongsTo('App\Models\OvinoModel', 'Id_ovino', 'Id_ovino');
    }

    public function responsable(){
        return $this->belongsTo('App\Models\ResponsableModel', 'Id_responsable', 'Id_responsable');
    }
}