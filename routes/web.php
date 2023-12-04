<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\DashboardAdministradorController;
use App\Http\Controllers\DashboardProfesorController;
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


Route::get('', [AutenticacionController::class, 'login'])->name('login');
Route::get('register', [AutenticacionController::class, 'register'])->name('register');

// Ruta para registrar por POST
Route::post('register', [AutenticacionController::class, 'store'])->name('register.store');

// Ruta para cerrar sesión
Route::get('logout', [AutenticacionController::class, 'logout'])->name('logout');

// Ruta para autenticar (iniciar sesión) por POST
Route::post('login', [AutenticacionController::class, 'authenticate'])->name('login.authenticate');

Route::middleware(['auth'])->group(function () {
    // Rutas para Profesores
    Route::prefix('profesor')->middleware(['profesor'])->group(function () {
        Route::get('dashboard', [DashboardProfesorController::class, 'index'])->name('profesor.dashboard');
        Route::get('examen', [DashboardProfesorController::class, 'examen'])->name('profesor.examen');
        Route::get('notas', [DashboardProfesorController::class, 'notas'])->name('profesor.notas');
        // Agrega más rutas específicas para Profesores si es necesario

        //CRUD Examen

        Route::get('examen/editar/{id}', [DashboardProfesorController::class, 'exameneditar'])->name('profesor.examen.editar');
        Route::post('examen/actualizar/{id}', [DashboardProfesorController::class, 'examenActualizar'])->name('profesor.examen.actualizar');

        //CRUD Notas
        Route::get('nota/editar/{id}', [DashboardProfesorController::class, 'notaEditar'])->name('profesor.nota.editar');
        Route::post('nota/actualizar/{id}', [DashboardProfesorController::class, 'notaActualizar'])->name('profesor.nota.actualizar');
    });

    // Rutas para Administradores
    Route::prefix('administrador')->middleware(['administrador'])->group(function () {
        Route::get('dashboard', [DashboardAdministradorController::class, 'index'])->name('administrador.dashboard');
        Route::get('profesores', [DashboardAdministradorController::class, 'profesores'])->name('administrador.profesores');
        Route::get('cursos', [DashboardAdministradorController::class, 'cursos'])->name('administrador.cursos');
        Route::get('student', [DashboardAdministradorController::class, 'student'])->name('administrador.student');
        Route::get('asignarstudentoutcomes', [DashboardAdministradorController::class, 'asignarstudentoutcomes'])->name('administrador.asignarstudentoutcomes');
        Route::get('asignarprofesor', [DashboardAdministradorController::class, 'asignarprofesor'])->name('administrador.asignarprofesor');

        // Agrega más rutas específicas para Administradores si es necesario

        // CRUD Curso Student Outcomes
        Route::post('asignarstudentoutcomes/create', [DashboardAdministradorController::class, 'asignarstudentoutcomescrear'])->name('administrador.asignarstudentout.crear');

        // CRUD Profesor
        Route::post('asignarprofesor/create', [DashboardAdministradorController::class, 'asignarprofesorcrear'])->name('administrador.asignarprofesor.crear');
    });
});
