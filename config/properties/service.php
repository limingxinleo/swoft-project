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
    'default' => [
        'name' => 'default',
        'uri' => [
            '127.0.0.1:8099',
            '127.0.0.1:8099',
        ],
        'minActive' => 8,
        'maxActive' => 8,
        'maxWait' => 8,
        'maxWaitTime' => 3,
        'maxIdleTime' => 60,
        'timeout' => 8,
        'useProvider' => false,
        'balancer' => 'random',
        'provider' => 'consul',
    ]
];
