<?php

namespace App\Http\Controllers;

use App\Facades\GitHub;

class DownloadController extends Controller
{
    public function __invoke()
    {
        $releases = GitHub::getReleases(config('github.releases_repo'));

        return view('downloads', [
            'releases' => $releases,
        ]);
    }
}
