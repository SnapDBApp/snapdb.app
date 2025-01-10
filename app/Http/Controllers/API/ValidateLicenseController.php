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

        // The license is valid
        return response()->json([
            'status' => 'valid',
            'message' => 'License is valid.',
        ], 200);
    }
}
