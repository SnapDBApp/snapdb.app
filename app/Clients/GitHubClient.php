<?php

namespace App\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GitHubClient
{
    private PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::baseUrl(config('github.api_base_url'))
            ->timeout(3)
            ->withHeader('X-GitHub-Api-Version', '2022-11-28');
    }

    /**
     * Returns the releases for a given repository.
     * Caches the result for a day.
     *
     * @param string $repoPath
     * @return mixed
     */
    public function getReleases(string $repoPath)
    {
        $cacheKey = 'gh_releases_' . $repoPath;

        return Cache::remember($cacheKey, now()->addDay(), function() use ($repoPath) {
            return $this->http->get('/repos/' . $repoPath . '/releases')->throw()->json();
        });
    }
}
