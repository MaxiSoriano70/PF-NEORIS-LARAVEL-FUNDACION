<?php

use App\Http\Controllers\AdministrarController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Cursos_TiposController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\Estudiantes_CursosController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\Institucion_DatosController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Mis_CursosController;
use App\Http\Controllers\Personal_CursosController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\Profesor_CursosController;
use App\Http\Controllers\TiposCursosController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
php artisan make:controller NameController --resource
php artisan route:list
*/
/*Route::resource('Login', 'LoginController');*/

/*Route::get('/', function () {
    return view("welcome");
})->name("Welcome");*/
/*BASE64 IMG.
BLOB */
Route::resource('/Welcome', WelcomeController::class)->except("create","store","edit","update","destroy");
Route::resource('Mis_Cursos', Mis_CursosController::class)->except("create","edit","update");
Route::post('/Login/diferenciar', [LoginController::class,'diferenciar'])->name("Login.diferenciar");
Route::resource('/Login',LoginController::class);
Route::resource('/Institucion', InstitucionController::class);
Route::resource('/Personal', PersonalController::class);
Route::resource('/Estudiantes', EstudiantesController::class);
Route::resource('/Personal',PersonalController::class);
Route::resource('/Administrar',AdministrarController::class)->except("create","store","show","edit","update","destroy");
Route::resource('/Categorias',CategoriasController::class);
Route::resource('/Cursos',CursosController::class);
Route::resource('/Cursos_Tipos',Cursos_TiposController::class);
Route::resource('/TiposCursos',TiposCursosController::class)->except("show");
Route::resource('/Profesor_Cursos',Profesor_CursosController::class);
Route::resource('/Estudiantes_Cursos',Estudiantes_CursosController::class);
