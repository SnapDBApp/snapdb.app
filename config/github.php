<?php

return [

    /*
    |--------------------------------------------------------------------------
    | GitHub API Base URL
    |--------------------------------------------------------------------------
    |
    | This is the base URL for GitHub's API. You can configure it to point
    | to the production or sandbox environment.
    |
    */

    'api_base_url' => env('GITHUB_API_BASE_URL', 'https://api.github.com'),

    /*
    |--------------------------------------------------------------------------
    | Releases Repository
    |--------------------------------------------------------------------------
    |
    | The repository path where releases of SnapDB are hosted. E.g. "SnapDB/App"
    |
    */

    'releases_repo' => env('GITHUB_RELEASES_REPO', 'example/example'),
];
