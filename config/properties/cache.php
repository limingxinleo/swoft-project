<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

return [
    'redis' => [
        'name' => 'redis',
        'uri' => [
            '127.0.0.1:6379',
            '127.0.0.1:6379',
        ],
        'minActive' => 5,
        'maxActive' => 10,
        'maxWait' => 20,
        'maxWaitTime' => 3,
        'maxIdleTime' => 60,
        'timeout' => 3,
        'db' => 0,
        'prefix' => '',
        'serialize' => 0,
    ],
];
