<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateLicenseRequest;
use App\Models\License;
use Illuminate\Support\Facades\Hash;

class LicenseController extends Controller
{
    /**
     * Validates a license key.
     *
     * @return mixed
     */
    public function validate(ValidateLicenseRequest $request)
    {
        // Find the first license that matches the key hash
        $licenses = License::where('email', $request->email)
            ->get();

        $license = $licenses->first(function ($license) use ($request) {
            return Hash::check($request->key, $license->key);
        });

        // No license found with this combination
        if (! $license) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'A license could not be found with the provided email and key.',
            ], 404);
        }

        // Check if the license is expired
        if ($license->expires_at !== null && $license->expires_at < now()) {
            return response()->json([
                'status' => 'expired',
                'message' => 'License has expired.',
            ], 410);
        }

        // The license is valid
        return response()->json([
            'status' => 'valid',
            'message' => 'License is valid.',
        ], 200);
    }
}
