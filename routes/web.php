<?php

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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('universidades')->name('universidades/')->group(static function() {
            Route::get('/',                                             'UniversidadeController@index')->name('index');
            Route::get('/create',                                       'UniversidadeController@create')->name('create');
            Route::post('/',                                            'UniversidadeController@store')->name('store');
            Route::get('/{universidade}/edit',                          'UniversidadeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UniversidadeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{universidade}',                              'UniversidadeController@update')->name('update');
            Route::delete('/{universidade}',                            'UniversidadeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('professors')->name('professors/')->group(static function() {
            Route::get('/',                                             'ProfessorController@index')->name('index');
            Route::get('/create',                                       'ProfessorController@create')->name('create');
            Route::post('/',                                            'ProfessorController@store')->name('store');
            Route::get('/{professor}/edit',                             'ProfessorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProfessorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{professor}',                                 'ProfessorController@update')->name('update');
            Route::delete('/{professor}',                               'ProfessorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('diretors')->name('diretors/')->group(static function() {
            Route::get('/',                                             'DiretorController@index')->name('index');
            Route::get('/create',                                       'DiretorController@create')->name('create');
            Route::post('/',                                            'DiretorController@store')->name('store');
            Route::get('/{diretor}/edit',                               'DiretorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DiretorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{diretor}',                                   'DiretorController@update')->name('update');
            Route::delete('/{diretor}',                                 'DiretorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('faculdades')->name('faculdades/')->group(static function() {
            Route::get('/',                                             'FaculdadeController@index')->name('index');
            Route::get('/create',                                       'FaculdadeController@create')->name('create');
            Route::post('/',                                            'FaculdadeController@store')->name('store');
            Route::get('/{faculdade}/edit',                             'FaculdadeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FaculdadeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{faculdade}',                                 'FaculdadeController@update')->name('update');
            Route::delete('/{faculdade}',                               'FaculdadeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('turmas')->name('turmas/')->group(static function() {
            Route::get('/',                                             'TurmaController@index')->name('index');
            Route::get('/create',                                       'TurmaController@create')->name('create');
            Route::post('/',                                            'TurmaController@store')->name('store');
            Route::get('/{turma}/edit',                                 'TurmaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TurmaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{turma}',                                     'TurmaController@update')->name('update');
            Route::delete('/{turma}',                                   'TurmaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('turmas')->name('turmas/')->group(static function() {
            Route::get('/',                                             'TurmasController@index')->name('index');
            Route::get('/create',                                       'TurmasController@create')->name('create');
            Route::post('/',                                            'TurmasController@store')->name('store');
            Route::get('/{turma}/edit',                                 'TurmasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TurmasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{turma}',                                     'TurmasController@update')->name('update');
            Route::delete('/{turma}',                                   'TurmasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('alunos')->name('alunos/')->group(static function() {
            Route::get('/',                                             'AlunoController@index')->name('index');
            Route::get('/create',                                       'AlunoController@create')->name('create');
            Route::post('/',                                            'AlunoController@store')->name('store');
            Route::get('/{aluno}/edit',                                 'AlunoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AlunoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{aluno}',                                     'AlunoController@update')->name('update');
            Route::delete('/{aluno}',                                   'AlunoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pre-requisitos')->name('pre-requisitos/')->group(static function() {
            Route::get('/',                                             'PreRequisitosController@index')->name('index');
            Route::get('/create',                                       'PreRequisitosController@create')->name('create');
            Route::post('/',                                            'PreRequisitosController@store')->name('store');
            Route::get('/{preRequisito}/edit',                          'PreRequisitosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PreRequisitosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{preRequisito}',                              'PreRequisitosController@update')->name('update');
            Route::delete('/{preRequisito}',                            'PreRequisitosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('disciplinas')->name('disciplinas/')->group(static function() {
            Route::get('/',                                             'DisciplinasController@index')->name('index');
            Route::get('/create',                                       'DisciplinasController@create')->name('create');
            Route::post('/',                                            'DisciplinasController@store')->name('store');
            Route::get('/{disciplina}/edit',                            'DisciplinasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DisciplinasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{disciplina}',                                'DisciplinasController@update')->name('update');
            Route::delete('/{disciplina}',                              'DisciplinasController@destroy')->name('destroy');
        });
    });
});