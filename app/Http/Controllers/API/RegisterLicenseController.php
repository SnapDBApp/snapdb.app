<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\RegisterLicenseRequest;
use App\Models\License;

class RegisterLicenseController extends BaseLicenseController
{
    /**
     * Registers a new device for a license.
     *
     * @return mixed
     */
    public function __invoke(RegisterLicenseRequest $request)
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

        // Make sure device max. is not reached
        if ($license->devices_count >= $license->max_devices) {
            return response()->json([
                'status' => 'max_devices_reached',
                'message' => 'The maximum number of devices has been reached for this license.',
            ], 403);
        }

        // Register the device
        $license->devices()->create([
            'name' => $request->deviceName,
            'device_id' => $request->deviceID,
        ]);

        $license->update(['last_seen_at' => now()]);

        return response()->json([
            'status' => 'success',
            'message' => 'Device registered successfully.',
        ], 200);
    }
}
