<?php

use App\Models\Entry;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [FileController::class, 'upload']);

Route::get('/files', function () {
    $data = Entry::all();
    $data->map(function ($item) {
        $item->path = "https://paragoncloudquiz3.sgp1.cdn.digitaloceanspaces.com/" . $item->path;
    });

    return view('file', ["data" => $data->toArray()]);
});