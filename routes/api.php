<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (Request $request) {
    return User::all();
});

Route::post('/users', function (Request $request) {
    return User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);
});

Route::put('/users/{user}', function (User $user, Request $request) {
   
    $success = $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    return [
        'success' => $success,
    ];
});

Route::delete('/users/{user}', function (User $user) {
   
    $success = $user->delete();

    return [
        'success' => $success,
    ];
});

