<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
use App\Core\Logger\Handlers\FileHandler;

return [
    'customLogger' => [
        'class' => \Swoft\Log\Logger::class,
        'name' => APP_NAME,
        'enable' => env('LOG_ENABLE', true),
        'flushInterval' => 100,
        'flushRequest' => true,
        'handlers' => [
            '${customHandler}',
        ],
    ],
    'customHandler' => [
        'class' => FileHandler::class,
        'fileName' => 'custom',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::INFO,
            \Swoft\Log\Logger::DEBUG,
            \Swoft\Log\Logger::NOTICE,
            \Swoft\Log\Logger::TRACE,
            \Swoft\Log\Logger::WARNING,
            \Swoft\Log\Logger::ERROR,
            \Swoft\Log\Logger::CRITICAL,
            \Swoft\Log\Logger::ALERT,
            \Swoft\Log\Logger::EMERGENCY,
        ],
    ],
];
