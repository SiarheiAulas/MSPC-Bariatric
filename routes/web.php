<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PrimaryDataController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\MainChartJsController;
use App\Http\Controllers\PatientChartJsController;
use App\Http\Controllers\CsvController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//группа роутов для фильтрации записей на главной странице
Route::group(['prefix'=>'patients'], function(){
    
    Route::get('/nosurgery', [PatientsController::class, 'nosurgery'])->middleware(['auth'])->name('nosurgery');
    
    Route::get('/lsg', [PatientsController::class, 'lsg'])->middleware(['auth'])->name('lsg');
    
    Route::get('/lagb', [PatientsController::class, 'lagb'])->middleware(['auth'])->name('lagb');
    
    Route::get('/mgb', [PatientsController::class, 'mgb'])->middleware(['auth'])->name('mgb');
    
    Route::get('/rygb', [PatientsController::class, 'rygb'])->middleware(['auth'])->name('rygb');
    
    Route::get('/gp', [PatientsController::class, 'gp'])->middleware(['auth'])->name('gp');
    
    Route::get('/other', [PatientsController::class, 'other'])->middleware(['auth'])->name('other');
    
    Route::get('/primary', [PatientsController::class, 'primary'])->middleware(['auth'])->name('primary');
    
    Route::get('/secondary', [PatientsController::class, 'secondary'])->middleware(['auth'])->name('secondary');
    
    Route::get('/simultaneous', [PatientsController::class, 'simultaneous'])->middleware(['auth'])->name('simultaneous');
    
    Route::get('/notsimultaneous', [PatientsController::class, 'notsimultaneous'])->middleware(['auth'])->name('notsimultaneous');
    
    Route::get('/complicated', [PatientsController::class, 'complicated'])->middleware(['auth'])->name('complicated');
    
    Route::get('/uncomplicated', [PatientsController::class, 'uncomplicated'])->middleware(['auth'])->name('uncomplicated');
    
    Route::get('/obes0', [PatientsController::class, 'obes0'])->middleware(['auth'])->name('obes0');
    
    Route::get('/obes1', [PatientsController::class, 'obes1'])->middleware(['auth'])->name('obes1');
    
    Route::get('/obes2', [PatientsController::class, 'obes2'])->middleware(['auth'])->name('obes2');
    
    Route::get('/obes3', [PatientsController::class, 'obes3'])->middleware(['auth'])->name('obes3');
    
});

//роут ресурс контроллера таблицы `patients`
Route::resource('patients', PrimaryDataController::class)->middleware(['auth']);

//роут ресурс контроллера таблицы `followups`
Route::resource('followups', FollowupController::class)->middleware(['auth']);

//роут для отображения диаграмм с главной страницы
Route::get('main/chart', [MainChartJsController::class, 'index'])->middleware(['auth'])->name('chart');

//роут для отображения графиков динамики показателей с страницы пациента
Route::get('patients/{id}/chart',[PatientChartJsController::class, 'index'])->middleware(['auth'])->name('ptchart');

//группа роутов для поиска пациентов
Route::group(['prefix'=>'search'], function(){
    
    //по номиру истории
    Route::get('id', [PrimaryDataController::class, 'search'])->middleware(['auth'])->name('search');
    
    //по фамилии
    Route::get('name', [PrimaryDataController::class, 'search_name'])->middleware(['auth'])->name('search_name');
});

//группа роутов для генерации отчета в IFSO
Route::group(['prefix'=>'ifso'], function(){
    //создает файл baseline
    Route::get('baseline', [CsvController::class, 'baseline'])->middleware(['auth'])->name('ifso_baseline');

    //создает файл followup
    Route::get('followup', [CsvController::class, 'followup'])->middleware(['auth'])->name('ifso_followup');
});

require __DIR__.'/auth.php';
