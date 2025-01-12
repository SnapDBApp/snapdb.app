<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\License;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $licenses = License::factory()->count(5)->create();

        $licenses->each(function (License $license) {
            Device::factory()->count(rand(1, 3))->create([
                'license_id' => $license->id,
            ]);
        });
    }
}
