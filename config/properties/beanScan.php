<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
$beanScan = [
    'App\\Breaker',
    'App\\Controllers',
    'App\\Core',
    'App\\Exception',
    'App\\Fallback',
    'App\\Lib',
    'App\\Listener',
    'App\\Middlewares',
    'App\\Models',
    'App\\Pool',
    'App\\Process',
    'App\\Services',
    'App\\Tasks',
    'App\\WebSocket',
];

return $beanScan;
