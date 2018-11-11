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
    'default' => [
        'name' => 'service',
        'uri' => [
            '127.0.0.1:8099',
        ],
        'minActive' => 2,
        'maxActive' => 10,
        'maxWait' => 20,
        'timeout' => 2,
        'maxIdleTime' => 60,
        'maxWaitTime' => 3,
        'useProvider' => false,
        'balancer' => 'random',
        'provider' => 'consul',
    ]
];
