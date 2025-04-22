<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ValidateLicenseRequest;
use App\Models\License;

class ValidateLicenseController extends BaseLicenseController
{
    /**
     * Validates a license key.
     *
     * @return mixed
     */
    public function __invoke(ValidateLicenseRequest $request)
    {
        // As of version 1.1.2 Supabase is used for license stuff
        // We will disable this endpoint from now on
        abort(500, 'Please update to the latest version of SnapDB.');

        $license = $this->findLicenseFromRequest($request);

        // No license found with this combination
        if (! $license) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'A license could not be found with the provided email and key.',
            ], 404);
        }

        // Check if the license is expired
        if ($license->isExpired()) {
            return response()->json([
                'status' => 'expired',
                'message' => 'This license has expired. Please renew your license to continue using SnapDB.',
            ], 410);
        }

        // Check if the license is registered to the requesting device
        if (! $license->devices()->where('device_id', $request->deviceID)->exists()) {
            return response()->json([
                'status' => 'unregistered_device',
                'message' => 'The license is not registered to the requesting device.',
            ], 401);
        }

        $license->update(['last_seen_at' => now()]);

        // The license is valid
        return response()->json([
            'status' => 'valid',
            'message' => 'License is valid.',
        ], 200);
    }
}
