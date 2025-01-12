<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageLicenseLoginRequest;
use App\Http\Requests\ManageLicenseRemoveDeviceRequest;
use App\Models\License;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManageLicenseController extends Controller
{
    /**
     * Shows the manage license page.
     *
     * @return \Illuminate\Foundation\Application|\Illuminate\View\View|mixed|null
     */
    public function index()
    {
        $license = $this->managingLicense();
        $devices = $license ? $license->devices : [];

        return view('manage-license.index', [
            'license' => $license,
            'devices' => $devices,
        ]);
    }

    /**
     * Logs the user in to manage a specific license.
     *
     * @return \Illuminate\Foundation\Application|\Illuminate\View\View|mixed|null
     */
    public function login(ManageLicenseLoginRequest $request)
    {
        $license = $this->findLicenseFromRequest($request);

        if ($license === null) {
            return back()->withErrors(['email' => 'No valid license was found with the given credentials.'])->withInput();
        }

        $request->session()->put('managing_license_id', $license->id);

        return back();
    }

    /**
     * Logs out the user from managing a license.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $request->session()->forget('managing_license_id');

        return back();
    }

    /**
     * Logs out the user from managing a license.
     *
     * @return RedirectResponse
     */
    public function removeDevice(ManageLicenseRemoveDeviceRequest $request)
    {
        $license = $this->managingLicense();

        if (! $license) {
            abort(403);
        }

        // Find the device
        $device = $license->devices()->find($request->id);

        if (! $device) {
            abort(404, 'Device not found.');
        }

        $device->delete();

        return back();
    }

    /**
     * Returns the license that is being managed (if any).
     */
    private function managingLicense(): ?License
    {
        return License::find(session('managing_license_id'));
    }
}
