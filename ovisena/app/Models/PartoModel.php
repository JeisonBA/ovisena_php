<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartoModel extends Model
{
    use HasFactory;
    protected $table = 'parto';

    // public function ovino(){
    //     return $this->belongsTo('App\Models\OvinoModel', 'Id_ovino', 'Id_ovino');
    // }
}