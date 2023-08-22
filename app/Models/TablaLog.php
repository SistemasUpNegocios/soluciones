<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaLog extends Model
{
    use HasFactory;

    protected $table = "tabla_logs";
    public $timestamps = false;
}
