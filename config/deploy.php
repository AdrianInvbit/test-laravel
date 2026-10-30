<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Deployment metadata
    |--------------------------------------------------------------------------
    |
    | Values are read from environment variables so ClonVercel (or any host)
    | can inject build/deploy information without changing application code.
    | Missing values are rendered as "No disponible" by the UI helpers.
    |
    */

    'app_name' => env('DEPLOY_APP_NAME', env('APP_NAME', 'test-laravel')),

    'app_version' => env('APP_VERSION', 'v0.1.0'),

    'git_branch' => env('GIT_BRANCH'),

    'git_commit' => env('GIT_COMMIT'),

    'deployed_at' => env('DEPLOYED_AT'),

];
