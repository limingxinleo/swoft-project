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
    'consul' => [
        'address' => 'http://127.0.0.1',
        'port' => 8500,
        'register' => [
            'id' => '',
            'name' => 'swoft',
            'tags' => [],
            'enableTagOverride' => false,
            'eto' => false,
            'service' => [
                'address' => '127.0.0.1',
                'port' => '8099',
            ],
            'check' => [
                'id' => '',
                'name' => 'swoft',
                'tcp' => '127.0.0.1:8099',
                'interval' => 10,
                'timeout' => 1,
            ],
        ],
        'discovery' => [
            'dc' => 'dc1',
            'near' => '',
            'tag' => '',
            'passing' => true
        ]
    ],
];
