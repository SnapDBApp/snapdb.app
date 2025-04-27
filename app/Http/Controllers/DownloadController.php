<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    public function __invoke()
    {
        return view('downloads');
    }
}
