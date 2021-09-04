<?php
$allow_domain = array();
// $allow_domain[] = 'https://ticmedi.com';
// $allow_domain[] = 'http://ticmedi.com';
// $allow_domain[] = 'https://dauthatlung.net';
// $allow_domain[] = 'http://dauthatlung.net';
// $allow_domain[] = 'https://dieutrixuongkhop.org'; 
// $allow_domain[] = 'http://dieutrixuongkhop.org';
// $allow_domain[] = 'http://localhost';
// $allow_domain[] = 'https://ticmedi.tech';
//$allow_domain[] = 'http://ticmedi.tech';
$allow_domain[] = '*';
return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    //'paths' => ['api/*'],
    'paths' => ['api/*', 'oauth/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => $allow_domain,
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    //'allowed_headers' => ['content-type', 'accept', 'x-custom-header', 'Access-Control-Allow-Origin'],
	//'exposed_headers' => ['x-custom-response-header'],
    //'exposed_headers' => [],
	'exposed_headers' => false,
    'max_age' => 0,
    'supports_credentials' => false,
];