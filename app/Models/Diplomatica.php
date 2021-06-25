<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplomatica extends Model
{
    protected $fillable = ['fecha','pais_a','representante_a','pais_b','representante_b','pais_c','representante_c','producto','descripcion'];
}
