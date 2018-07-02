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
    'env' => env('APP_ENV', 'test'),
    'debug' => env('APP_DEBUG', false),
    'version' => '1.0',
    'autoInitBean' => true,
    'bootScan' => [
        'App\Commands',
        'App\Boot',
    ],
    'excludeScan' => [

    ],
    'I18n' => [
        'sourceLanguage' => '@root/resources/messages/',
    ],
    'db' => require __DIR__ . DS . 'db.php',
    'cache' => require __DIR__ . DS . 'cache.php',
    'service' => require __DIR__ . DS . 'service.php',
    'breaker' => require __DIR__ . DS . 'breaker.php',
    'provider' => require __DIR__ . DS . 'provider.php',
    'message' => require __DIR__ . DS . 'message.php',
    'queue' => require __DIR__ . DS . 'queue.php',
];
