<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    //use HasFactory;
    protected $table = "roles";
    use HasFactory;

    protected $fillable = [
        'ROL_DESCRIPCION',
        'ROL_ESTADO',
    ];
}
