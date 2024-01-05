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
        if ($item->medium == "space") {
            $item->path = "https://inclasscloudquiz3.sgp1.digitaloceanspaces.com/" . $item->path;
        } else {

            $path = "uploads/zM7n4I5ifwD2KOSK0kPq6J6bX0fqsZoDeUU7Brtj.jpg";

// Remove "uploads/" from the path
            $result = str_replace("uploads/", "", $path);

            $item->path = $result;
        }
    });

    return view('file', ["data" => $data->toArray()]);
});

Route::get('/download/{path}', function ($path) {
    $path = "uploads/" . $path;

    if (!Storage::disk('block_storage')->exists($path)) {
        abort(404);
    }

    $file = Storage::disk('block_storage')->get($path);
    $mimeType = Storage::disk('block_storage')->mimeType($path);

    return response($file, 200)->header('Content-Type', $mimeType)
        ->header('Content-Disposition', 'inline; filename="' . basename($path) . '"');
});