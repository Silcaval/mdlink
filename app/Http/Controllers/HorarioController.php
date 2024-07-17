<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;


class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('empleados', compact('horarios'));
    }
}