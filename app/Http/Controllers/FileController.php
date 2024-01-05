<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $path = "";
        if ($request->to === "volume") {
            $file = $request->file('file');
            $path = $file->store('uploads', 'block_storage'); // 'uploads' is the fold
        }
        else {
            $file = $request->file('file');
            $path = $file->store('uploads', 'spaces'); // 'uploads' is the fold
        }

        Entry::create([
            "firstname" => $request["firstname"],
            "lastname" => $request["lastname"],
            "path" => $path,
        ]);

        return response()->json(['path' => $path]);
    }
}
