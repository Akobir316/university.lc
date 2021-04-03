<?php

use App\Http\Controllers\Admin\ClassroomsController;
use App\Http\Controllers\Admin\DisciplinesController;
use App\Http\Controllers\Admin\FacultiesController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\KafedrsController;
use App\Http\Controllers\Admin\LessonsController;
use App\Http\Controllers\Admin\LessTypesController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\TimeTablesController;
use App\Http\Controllers\Admin\UserRolesController;
use App\Http\Controllers\Admin\UsersController;
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
Route::group(['middleware' => ['role:teacher']], function (){

    Route::get('/teachers/{id}', [\App\Http\Controllers\TeachersController::class,'index'])->name('teachers');
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
    Route::resource('/faculties', FacultiesController::class);
    Route::resource('/kafedrs', KafedrsController::class);
    Route::resource('/groups', GroupsController::class);
    Route::resource('/teachers', TeachersController::class);
    Route::resource('/disciplines', DisciplinesController::class);
    Route::resource('/students', StudentsController::class);
    Route::resource('/lessons', LessonsController::class);
    Route::resource('/classrooms', ClassroomsController::class);
    Route::resource('/lesstypes', LessTypesController::class);
    Route::resource('/timetables', TimeTablesController::class);
    Route::resource('/users', UsersController::class );
    Route::resource('/roles', RolesController::class);
    Route::resource('/user-roles', UserRolesController::class);
});


