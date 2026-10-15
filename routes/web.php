<?php

use App\Http\Controllers\CongregationController;
use App\Http\Controllers\MissionaryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController as ControllersUserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/usuarios', [UserController::class, 'index']);
Route::get('admin/usuarios/{user}', [UserController::class, 'show']);
Route::post('admin/usuarios', [UserController::class, 'store']);

Route::get('admin/missionarios', [MissionaryController::class, 'index']);
Route::get('admin/missionarios/{missionary}', [MissionaryController::class, 'show']);
Route::post('admin/missionarios', [MissionaryController::class, 'store']);

Route::get('admin/congregacoes', [CongregationController::class, 'index']);
Route::get('admin/congregacoes/{congregation}', [CongregationController::class, 'show']);
Route::post('admin/congregacoes', [CongregationController::class, 'store']);