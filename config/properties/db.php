<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

return [
    'master' => [
        'name' => 'master',
        'uri' => [
            '127.0.0.1:3306/test?user=root&password=123456&charset=utf8',
            '127.0.0.1:3306/test?user=root&password=123456&charset=utf8',
        ],
        'minActive' => 8,
        'maxActive' => 8,
        'maxWait' => 8,
        'timeout' => 8,
        'maxIdleTime' => 60,
        'maxWaitTime' => 3,
    ],

    'slave' => [
        'name' => 'slave',
        'uri' => [
            '127.0.0.1:3306/test?user=root&password=123456&charset=utf8',
            '127.0.0.1:3306/test?user=root&password=123456&charset=utf8',
        ],
        'minActive' => 8,
        'maxActive' => 8,
        'maxWait' => 8,
        'timeout' => 8,
        'maxIdleTime' => 60,
        'maxWaitTime' => 3,
    ],
];
