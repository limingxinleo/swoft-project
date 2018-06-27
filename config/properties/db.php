<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

$masterUris = explode(',', env('DB_URI', '127.0.0.1:3306/test?user=root&password=910123&charset=utf8'));
$slaveUris = explode(',', env('DB_SLAVE_URI', '127.0.0.1:3306/test?user=root&password=123456&charset=utf8'));

return [
    'master' => [
        'name' => env('DB_NAME', 'master'),
        'uri' => $masterUris,
        'minActive' => env('DB_MIN_ACTIVE', 1),
        'maxActive' => env('DB_MAX_ACTIVE', 10),
        'maxWait' => env('DB_MAX_WAIT', 20),
        'timeout' => env('DB_TIMEOUT', 2),
        'maxIdleTime' => env('DB_MAX_IDLE_TIME', 60),
        'maxWaitTime' => env('DB_MAX_WAIT_TIME', 3),
    ],

    'slave' => [
        'name' => env('DB_SLAVE_NAME', 'slave'),
        'uri' => $masterUris,
        'minActive' => env('DB_SLAVE_MIN_ACTIVE', 1),
        'maxActive' => env('DB_SLAVE_MAX_ACTIVE', 10),
        'maxWait' => env('DB_SLAVE_MAX_WAIT', 20),
        'timeout' => env('DB_SLAVE_TIMEOUT', 2),
        'maxIdleTime' => env('DB_SLAVE_MAX_IDLE_TIME', 60),
        'maxWaitTime' => env('DB_SLAVE_MAX_WAIT_TIME', 3),
    ],
];
