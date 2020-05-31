<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Allowed domains
    |--------------------------------------------------------------------------
    |
    | Set domains allowed to receiver CORS headers, fallback to APP_URL env
    */
    'allowed_domains' => env('ALLOWED_CORS_DOMAINS', join('://', array_intersect_key(parse_url(env('APP_URL')), array_flip(['scheme', 'host'])))),

    /*
    |--------------------------------------------------------------------------
    | Allowed headers
    |--------------------------------------------------------------------------
    |
    | Set headers allower to receiver CORS headers, fallback to APP_URL env
    */
    'allowed_headers' => env('ALLOWED_CORS_HEADERS'),

];
