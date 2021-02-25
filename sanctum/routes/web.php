<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('app');
});

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->get('/entries', function(Request $request) {
    return $request->user()->entries;
});
