<?php
/**
 * Created by PhpStorm.
 * User: targaryen
 * Date: 2018/8/25
 * Time: 上午10:17
 */

return [
    'proxy' => [
        'grant_type'    => env('OAUTH_GRANT_TYPE'),
        'client_id'     => env('OAUTH_CLIENT_ID'),
        'client_secret' => env('OAUTH_CLIENT_SECRET'),
        'scope'         => env('OAUTH_SCOPE', '*'),
    ],
];
