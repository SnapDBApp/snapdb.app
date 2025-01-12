<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

abstract class Controller
{
    /**
     * Find a license from the request.
     */
    protected function findLicenseFromRequest(Request $request): ?License
    {
        $licenses = License::where('email', $request->email)
            ->get();

        return $licenses->first(function ($license) use ($request) {
            return Hash::check($request->key, $license->key);
        });
    }
}
