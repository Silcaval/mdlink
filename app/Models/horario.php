<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    use HasFactory;
    protected $table = "horario";
    
    protected $fillable = ['hor_inicio', 'hor_fin', 'estado'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
