<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaveInversor extends Model
{
    use HasFactory;

    protected $table = "clave_inversor";
    public $timestamps = false;
}
