<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

use Swoft\Http\Server\ServerDispatcher;

return [
    'serverDispatcher' => [
        'class' => ServerDispatcher::class,
        'middlewares' => [
            \Swoft\View\Middleware\ViewMiddleware::class,
            // \Swoft\Devtool\Middleware\DevToolMiddleware::class,
            // \Swoft\Session\Middleware\SessionMiddleware::class,
        ]
    ],
    'httpRouter' => [
        'ignoreLastSlash' => false,
        'tmpCacheNumber' => 1000,
        'matchAll' => '',
    ],
    'requestParser' => [
        'parsers' => [

        ],
    ],
    'view' => [
        'viewsPath' => '@resources/views/',
    ],
    'cache' => [
        'driver' => 'redis',
    ],
];
