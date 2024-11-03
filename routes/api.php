<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        // Aquí se colocan todas las rutas que requieran autenticación
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    // Pedidos
    Route::apiResource('/pedidos', PedidoController::class);
});

// apiResource asocia los nombres de las funciones de los controladores
Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/productos', ProductoController::class);

// Autenticación
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
