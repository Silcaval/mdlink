<?php

use App\Http\Controllers\empleadoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\punchController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\exportController;
use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\Route;

// Route::get('/',[loginController::class,'index'])->name('home');
// Route::post('/login',[LoginController::class,'login'])->name('user.login');
// //ruta para el menu del admin
// Route::get('/menuadmin',[RolesController::class,'menu'])->name('admin.menu');

/* Rutas usables  */
//Lleva a la pagina principal
//Route::get('/',[UserController::class,'usersview'])->name('users.view');

Route::get('/',[LoginController::class,'index'])->name('home');

//Ruta para el login
Route::post('/login',[LoginController::class,'login'])->name('user.login');

//Ruta para el logout
Route::post('/logout',[LoginController::class,'logout'])->name('user.logout');


//ruta para el menu del admin
Route::get('/menuadmin',[RolesController::class,'menu'])->name('admin.menu');

//ruta para el menu del moderador
Route::get('/menumodera',[RolesController::class,'moder'])->name('moder.menu');

//ruta para el menu del visor
Route::get('/menuvisor',[RolesController::class,'visor'])->name('visor.menu');

//Ruta para acceder a la vista de usuario 
Route::get('/usuarios',[userController::class,'usersview'])->name('user.view');

//ruta de tipo post para guardar la informacion del usuario
Route::post('/usuarios/save',[UserController::class,'store'])->name('users.save');

//Ruta para actualizar el usuario
Route::put('usuarios/update/{id}',[UserController::class,'update'])->name('users.update');

//Ruta para inhabilitar usuario
Route::put('usuarios/delete/{id}',[UserController::class,'delete'])->name('users.delete');

//vista para cambiar contra
Route::get('/change',[userController::class,'change'])->name('users.change');
//Ruta para cambiar contraseña
Route::post('/changepass',[userController::class,'passChange'])->name('users.changepass');

//ruta para empleados
Route::get('/empleados',[empleadoController::class,'emp'])->name('Empleados.view');

// ruta para crear empleados / agregado por Silvia
/*Route::get('/empleados', [EmpleadoController::class, 'emp'])->name('Empleados');
Route::get('/empleados', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'guardar'])->name('empleados.store');
Route::get('/empleados/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{id}', [EmpleadoController::class, 'actualizar'])->name('empleados.update');
Route::delete('/empleados/{id}', [EmpleadoController::class, 'eliminar'])->name('empleados.destroy');*/



//Route::get('/empleados/create', [EmpleadoController::class, 'create']);

//Route::get('/empleados', [HorarioController::class, 'index']);

/*Route::get('/empleados2', function () {
    return view('empleados');
});

Route::get('/empleados2', [HorarioController::class, 'index']);
*/



//ruta buscar empleado por ID
Route::get('/empleados/buscar/{id}',[empleadoController::class,'buscarPorId'])->name('Empleados.id');

//ruta para guardar
Route::get('/empleados/guardar',[empleadoController::class,'guardar'])->name('Empleados.guardar');

//ruta para actualizazr
Route::get('/empleados/actualizar/{id}',[empleadoController::class,'actualizar'])->name('Empleados.actualizar');

//ruta para marcar como inactivo (eliminar)
Route::get('/empleados/eliminar/{id}',[empleadoController::class,'eliminar'])->name('Empleados.eliminar');

// ruta para mostrar dispositivos
Route::get('/dispositivo',[DispositivoController::class,'index'])->name('dispositivo.index');

//ruta para crear un dispositivo
Route::post('/dispositivo/save',[DispositivoController::class,'store'])->name('dispositivo.save');

// ruta para actualizar un departamento

Route::put('/dispositivo/update/{id}',[DispositivoController::class,'update'])->name('dispositivo.update');

// ruta para deshabilitar un departamento
Route::put('/dispositivo/delete/{id}',[DispositivoController::class,'delete'])->name('dispositivo.delete');

//Ruta para la consulta de punches
Route::get('/punches',[punchController::class,'viewPunch'])->name('punch.view');

//Ruta para el metodo de consulta
Route::get('/punches/search',[punchController::class,'searchDate'])->name('punch.search');

//Ruta para guardar archivo de excel
Route::get('/punches/export',[exportController::class,'export'])->name('punch.export');

// Visualizar vista de dispositivos
Route::get('/dispositivo', [DispositivoController::class, 'index'])->name('dispositivo.view');
// Guardado de dispositivos
Route::post('/dispositivo/guardar', [DispositivoController::class, 'store'])->name('dispositivo.save');
// Ruta para eliminar un dispositivo (actualizar estado a 0)
Route::post('/dispositivo/eliminar/{id}', [DispositivoController::class, 'delete'])->name('dispositivo.delete');
