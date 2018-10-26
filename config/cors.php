<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => true,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['Content-Type', 'X-Requested-With', 'X-Auth-Token'],
    'allowedMethods' => ['*'],
    'exposedHeaders' => ['Authorization'],
    'maxAge' => 0,

];
