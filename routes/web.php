<?php

use App\Http\Controllers\Admin\FacultiesController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
*/
Route::group(['middleware' => ['role:teacher'], 'prefix'=>'teachers'], function (){

    Route::get('/', [\App\Http\Controllers\TeachersController::class,'index'])->name('teachers.index');
    Route::get('/filters', [\App\Http\Controllers\TeachersController::class,'filterTable'])->name('filters');
});
Route::group(['middleware'=>['role:student']], function (){
    Route::get('/students/{id}',[\App\Http\Controllers\StudentsController::class, 'index'])->name('students');
});
Route::group(['middleware'=>'guest'], function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
//admin
Route::group(['middleware' => ['role:admin'], 'prefix'=>'admin'], function (){
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/students', StudentsController::class);
    Route::resource('/faculties', FacultiesController::class);
});


