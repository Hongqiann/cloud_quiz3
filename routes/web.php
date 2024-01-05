<?php

use App\Models\Entry;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
        $item->path = "https://inclasscloudquiz3.sgp1.digitaloceanspaces.com/" . $item->path;
    });

    return view('file', ["data" => $data->toArray()]);
});

Route::get('/download/{path}', function ($path) {
    $path = "/mnt/volume_sgp1_01/" . $path;
return response(Storage::disk('block_storage')->get($path))
    ->header('Content-Type', 'your/mime-type')
    ->header('Content-Disposition', 'attachment; filename="' . basename($path) . '"');
});