<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table='carrera';
    protected $primaryKey='codigo';
    public $timestamps=false;
}
