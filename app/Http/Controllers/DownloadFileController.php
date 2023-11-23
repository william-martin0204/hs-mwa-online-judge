<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{

    public function download($id, $type)
    {
        $content = Storage::disk('cases')->get($id.'.'.$type);

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, $id.'.'.$type);
    }
}
