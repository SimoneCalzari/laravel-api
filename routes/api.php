<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// prova restituzione json
// Route::get('/projects', function () {
//     return response()->json([
//         'name' => 'Simone',
//         'surname' => 'Calzari',
//         'amici' => ['bello', 'brutto']
//     ]);
// });

// controller che risponde alla chiamata
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{slug}', [ProjectController::class, 'show']);

// rotta per creazione commenti da front end
Route::post('/comments', [CommentController::class, 'store']);
