<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/', [ProjectController::class, 'index']);

Route::get('/project/create', [ProjectController::class, 'create']);

Route::get('/project/list', [ProjectController::class, 'projectList']);

Route::get('/project/{id}', [ProjectController::class, 'show']);

Route::post('/project', [ProjectController::class, 'store']);

Route::post('/project/{id}/task', [TaskController::class, 'store']);

Route::get('/swot', function(){ return view('swot.swot');});

Route::get('/project/{id}/task/ended', [TaskController::class, 'taskEnded']);

