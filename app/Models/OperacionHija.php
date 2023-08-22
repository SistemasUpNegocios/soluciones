<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperacionHija extends Model
{
    use HasFactory;

    protected $table = "operacion_hija";
    public $timestamps = false;
}
