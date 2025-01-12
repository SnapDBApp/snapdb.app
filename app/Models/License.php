<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class License extends Model
{
    /** @use HasFactory<\Database\Factories\LicenseFactory> */
    use HasFactory;

    public $guarded = [];

    protected $casts = [
        'expires_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'key' => 'hashed',
    ];

    protected $withCount = ['devices'];

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    /**
     * Whether the license is expired.
     */
    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at < now();
    }

    /**
     * Sets a new license key and returns it.
     */
    public function generateAndSaveKey(): string
    {
        $newLicenseKey = Str::uuid();

        $this->update([
            'key' => $newLicenseKey,
            'key_first_part' => str($newLicenseKey)->limit(5, ''),
        ]);

        return $newLicenseKey;
    }

    /**
     * Whether the license is valid.
     */
    public function isValid(): bool
    {
        return $this->expires_at === null || $this->expires_at->isFuture();
    }
}
