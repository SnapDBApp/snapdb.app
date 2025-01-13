<?php

namespace App\Http\Controllers;

class SupportedDatabaseController extends Controller
{
    public function index()
    {
        return view('supported-databases.index');
    }

    public function show(string $slug)
    {
        $databases = config('supported-databases');

        // Find with the slug
        $database = collect($databases)->firstWhere('slug', $slug);

        if (! $database) {
            abort(404);
        }

        return view('supported-databases.show', [
            'database' => $database,
        ]);
    }
}
