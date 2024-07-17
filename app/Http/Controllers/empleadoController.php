<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar inicio empleados
    public function emp()
    {
        $horarios = Horario::all();
        return view('empleados', compact('horarios'));
    }

    public function create()
    {
        $horarios = Horario::all();
        return view('empleados', compact('horarios'));
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $horarios = Horario::all();
        return view('empleados', compact('empleado', 'horarios'));
    }

    public function guardar(Request $request)
    {
        try {
            $empleado = new Empleado();
            $empleado->EMP_NOMBRE = $request->input('nombre');
            $empleado->EMP_DNI = $request->input('dni');
            $empleado->EMP_FECHA_NAC = $request->input('fecha_nac');
            $empleado->EMP_HORARIO = $request->input('emp_horario'); // Asegúrate de que esto coincida con el name del select
            $empleado->EMP_DEPARTAMENTO = $request->input('departamento');
            $empleado->EMP_ESTADO = $request->input('estado');
            $empleado->EMP_RFID = $request->input('rfid');
            $empleado->save();

            return redirect()->route('Empleados')->with('exito', 'Empleado guardado exitosamente!!');
        } catch (\Exception $e) {
            return redirect()->route('Error')->with('error', 'Ha ocurrido un error al guardar el empleado.');
        }
    }

    public function actualizar(Request $request, $id)
    {
        try {
            $empleado = Empleado::find($id);

            if (!$empleado) {
                return "No se encontró ningún empleado con el ID: $id";
            }

            $empleado->EMP_NOMBRE = $request->input('nombre');
            $empleado->EMP_DNI = $request->input('dni');
            $empleado->EMP_FECHA_NAC = $request->input('fecha_nac');
            $empleado->EMP_HORARIO = $request->input('emp_horario'); // Asegúrate de que esto coincida con el name del select
            $empleado->EMP_DEPARTAMENTO = $request->input('departamento');
            $empleado->EMP_ESTADO = $request->input('estado');
            $empleado->EMP_RFID = $request->input('rfid');
            $empleado->save();

            return redirect()->route('Empleados')->with('exito', 'Empleado actualizado exitosamente!!');
        } catch (\Exception $e) {
            return redirect()->route('Error')->with('error', 'Ha ocurrido un error al actualizar el empleado.');
        }
    }

    public function eliminar($id)
    {
        try {
            $empleado = Empleado::find($id);

            if (!$empleado) {
                return "No se encontró ningún empleado con el ID: $id";
            }

            $empleado->EMP_ESTADO = 0;
            $empleado->save();

            return redirect()->route('Empleados')->with('exito', 'Empleado eliminado exitosamente!!');
        } catch (\Exception $e) {
            return redirect()->route('Error')->with('error', 'Ha ocurrido un error al eliminar el empleado.');
        }
    }
}


