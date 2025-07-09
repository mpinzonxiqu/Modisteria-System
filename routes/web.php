<?php


use App\Http\Controllers\AutomovilController;
use App\Http\Controllers\MigracionController;

use App\Http\Controllers\ReporteUsuarioController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaDeTrabajoController;
use App\Http\Controllers\ReporteController;
      
use App\Http\Controllers\ReporteAreaController;
                 
use App\Http\Controllers\ListaReportesController;

use App\Http\Controllers\PanelPrincipalController; // Asegúrate de tener esto al principio de tu archivo

use App\Http\Controllers\ReporteTrabajoController;
// routes/web.php         

use App\Http\Controllers\UserController; // Asegúrate de importar el controlador



// routes/web.php

use App\Http\Controllers\NuevoReporteController;



use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ReportController;


use App\Http\Controllers\AuthController;



use App\Http\Controllers\ReporteAsignadoController;

use App\Http\Controllers\UserManagementController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Ruta para el CRUD de usuarios
Route::resource('/usuarios', UsuarioController::class);
require __DIR__.'/auth.php';

Route::get('/nueva-vista', function () {
    return view('ajustes-nueva-vista');
});

// Ruta para el CRUD de Area de Trabajo
Route::get('/areas_de_trabajo/create', [AreaDeTrabajoController::class, 'create'])->name('create_area_de_trabajo');
Route::post('/areas_de_trabajo', [AreaDeTrabajoController::class, 'store'])->name('areas_de_trabajo.store');

 Route::get('/areas_de_trabajo', [AreaDeTrabajoController::class, 'index'])->name('areas_de_trabajo.index');

Route::get('/areas_de_trabajo/{id}/users', [AreaDeTrabajoController::class, 'showUsers'])->name('areas_de_trabajo.showUsers');
Route::get('/areas_de_trabajo/{id}/edit', [AreaDeTrabajoController::class, 'edit'])->name('areas_de_trabajo.edit');
Route::put('/areas_de_trabajo/{id}', [AreaDeTrabajoController::class, 'update'])->name('areas_de_trabajo.update');
Route::delete('/areas_de_trabajo/{id}', [AreaDeTrabajoController::class, 'destroy'])->name('areas_de_trabajo.destroy');

Route::get('/reportes/create', [ReporteController::class, 'create'])->name('reportes.create');Route::get('migraciones/create', [MigracionController::class, 'create'])->name('migraciones.create');
Route::post('migraciones/store', [MigracionController::class, 'store'])->name('migraciones.store');
Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');


Route::get('/reportes/create', [ReporteController::class, 'create'])->name('reportes.create');

// Almacenar los reportes (cuando se envíe el formulario)
Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');


Route::resource('reporte_area', ReporteAreaController::class);
Route::resource('reporte_usuario', ReporteUsuarioController::class);




Route::get('/reporte_area/create', [ReporteAreaController::class, 'create'])->name('reporte_area.create');



Route::get('/reportes', [ReporteController::class, 'create'])->name('reportes.create');
Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');
Route::get('/reportes/{id}/edit', [ReporteController::class, 'edit'])->name('reportes.edit');
Route::delete('/reportes/{id}', [ReporteController::class, 'destroy'])->name('reportes.destroy');



Route::get('/reportes/lista', [ListaReportesController::class, 'index'])->name('reportes.lista');


Route::resource('reporte_area', ReporteAreaController::class);        

Route::get('reporte_area/{id}', [ReporteAreaController::class, 'show'])->name('reporte_area.show');


// Ruta para mostrar el formulario de registro
Route::get('reporte_area/create', [ReporteAreaController::class, 'create'])->name('reporte_area.create');

// Ruta para almacenar el nuevo "Reporte de Área"

Route::get('reporte_area/create', [ReporteAreaController::class, 'create'])->name('reporte_area.create');
Route::post('reporte_area', [ReporteAreaController::class, 'store'])->name('reporte_area.store');



// Mostrar la lista de reportes
Route::get('nueva_lista_reportes/lista', [NuevoReporteController::class, 'lista'])->name('nueva_lista_reportes.lista');

// Mostrar los detalles de un reporte seleccionado
Route::get('nueva_lista_reportes/show', [NuevoReporteController::class, 'show'])->name('nueva_lista_reportes.show');

// routes/web.php

// Ruta para mostrar el formulario de creación de reportes de área
Route::get('reporte_area/create', [ReporteAreaController::class, 'create'])->name('reporte_area.create');

// Ruta para almacenar el nuevo reporte de área
Route::post('reporte_area/store', [ReporteAreaController::class, 'store'])->name('reporte_area.store');



// Ruta para mostrar el formulario de creación de reportes de área
Route::get('reporte_area/create', [ReporteAreaController::class, 'create'])->name('reporte_area.create');

// Ruta para almacenar el nuevo reporte de área
Route::post('reporte_area/store', [ReporteAreaController::class, 'store'])->name('reporte_area.store');

Route::get('reportes', [ReporteController::class, 'index'])->name('reportes.index');


Route::get('reporte_usuario/create', [ReporteUsuarioController::class, 'create'])->name('reporte_usuario.create');



// Ruta para mostrar la lista de usuarios
//Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');


Route::post('/reporte_usuario/create', [ReporteController::class, 'asignarReporte'])->name('asignar.reporte');

Route::get('/asignar/reporte', [ReporteUsuarioController::class, 'create'])->name('asignar.reporte');
Route::post('/asignar/reporte', [ReporteUsuarioController::class, 'store']);









Route::get('reporte-area/create', [ReporteAreaController::class, 'create'])->name('reporte_area.create');
//Route::post('reporte-area/store', [ReporteAreaController::class, 'store'])->name('reporte_area.store');






Route::get('/asignar-reporte', [ReporteUsuarioController::class, 'index'])->name('reporte_usuario.index');







// Ruta para mostrar el formulario (GET)
Route::get('/nueva_lista_reportes/lista2', [ReporteAreaController::class, 'create'])->name('reporte_area.create');

// Ruta para manejar el formulario (POST)
Route::post('/nueva_lista_reportes/lista2', [ReporteAreaController::class, 'store'])->name('reporte_area.store');



Route::get('/reporte_area/create', [ReporteAreaController::class, 'create'])->name('reporte_area.create');
Route::post('/reporte_area', [ReporteAreaController::class, 'store'])->name('reporte_area.store');
















Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/users', [AdminController::class, 'users'])->name('users');
Route::get('/settings', [AdminController::class, 'settings'])->name('settings');


Route::get('/admin/menu', function() {
    return view('admin_menu');
});




Route::get('/area-de-trabajo', [AreaDeTrabajoController::class, 'index'])->name('area-de-trabajo.index');


Route::get('/report/assign', [ReportController::class, 'showAssignForm'])->name('assign.report');



Route::get('/nuevo-panel', function () {
    return view('nuevo_panel');  // Vista que se creará más tarde
});



Route::get('/user/panel', [PanelPrincipalController::class, 'showPanel'])->name('user.panel');



Route::get('/reportes', [ReportController::class, 'index']);




Route::middleware('auth')->group(function () {
    // Ruta para ver los reportes asignados
    Route::get('/user/reportes', [UserController::class, 'showReportesAsignados'])->name('user.reportes');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






 
Route::resource('area-de-trabajo', AreaDeTrabajoController::class);



Route::resource('users', UserController::class);


Route::resource('usuarios', UserController::class);








//Route::get('/admin', [AuthController::class, 'adminPanel'])->name('admin');
//Route::get('/user', [AuthController::class, 'userPanel'])->name('user');





Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para los dashboards según rol
Route::get('admin/dashboard', function() {
    return view('admin.dashboard'); // Vista para el administrador
})->name('admin.dashboard');

Route::get('user/dashboard', function() {
    return view('user.dashboard'); // Vista para el usuario
})->name('user.dashboard');


// routes/web.php

Route::middleware(['auth'])->group(function () {
    // Ruta para ver los reportes asignados
    Route::get('/reportes/asignados', [ReporteAsignadoController::class, 'index'])->name('reportes.asignados');
});


Route::put('/reportes/{id}', [ReporteController::class, 'update'])->name('reportes.update');
Route::delete('/reportes/{id}', [ReporteController::class, 'destroy'])->name('reportes.destroy');


Route::prefix('user-management')->group(function() {
    // Rutas para gestionar usuarios
    Route::get('/', [UserManagementController::class, 'index'])->name('user-management.index');  // Mostrar lista de usuarios
    Route::get('create', [UserManagementController::class, 'create'])->name('user-management.create');  // Crear un nuevo usuario
    Route::post('store', [UserManagementController::class, 'store'])->name('user-management.store');  // Almacenar un nuevo usuario
    Route::get('edit/{user}', [UserManagementController::class, 'edit'])->name('user-management.edit');  // Editar un usuario
    Route::put('update/{user}', [UserManagementController::class, 'update'])->name('user-management.update');  // Actualizar un usuario
    Route::delete('destroy/{user}', [UserManagementController::class, 'destroy'])->name('user-management.destroy');  // Eliminar un usuario

    Route::get('/reportes', [ReporteUsuarioController::class, 'index'])->name('reportes.index');

});








Route::get('/automoviles/crear', [AutomovilController::class, 'create'])->name('automoviles.create');
Route::post('/automoviles', [AutomovilController::class, 'store'])->name('automoviles.store');


use App\Http\Controllers\FacturaController;

Route::resource('facturas', FacturaController::class)
     ->names('facturas');          // facturas.index, facturas.create, ...
