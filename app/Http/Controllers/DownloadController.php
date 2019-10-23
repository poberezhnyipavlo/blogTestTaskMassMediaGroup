<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download(Request $request)
    {
        return response()->download(storage_path('app/public/' . $request->path));
    }
}
