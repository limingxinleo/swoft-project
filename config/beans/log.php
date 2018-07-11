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
    'debugHandler' => [
        'class' => \Swoft\Log\FileHandler::class,
        'logFile' => '@runtime/logs/debug.log',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::INFO,
            \Swoft\Log\Logger::DEBUG,
            \Swoft\Log\Logger::TRACE,
        ],
    ],
    'traceHandler' => [
        'class' => \Swoft\Log\FileHandler::class,
        'logFile' => '@runtime/logs/trace.log',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::TRACE,
        ],
    ],
    'noticeHandler' => [
        'class' => \Swoft\Log\FileHandler::class,
        'logFile' => '@runtime/logs/notice.log',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::NOTICE,
        ],
    ],
    'applicationHandler' => [
        'class' => \Swoft\Log\FileHandler::class,
        'logFile' => '@runtime/logs/error.log',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::WARNING,
            \Swoft\Log\Logger::ERROR,
            \Swoft\Log\Logger::CRITICAL,
            \Swoft\Log\Logger::ALERT,
            \Swoft\Log\Logger::EMERGENCY,
        ],
    ],
    'logger' => [
        'name' => APP_NAME,
        'enable' => env('LOG_ENABLE', false),
        'flushInterval' => 100,
        'flushRequest' => true,
        'handlers' => [
            '${noticeHandler}',
            '${applicationHandler}',
            '${debugHandler}',
            '${traceHandler}',
        ],
    ],
    'lineFormatter' => [
        'class' => \Monolog\Formatter\LineFormatter::class,
        'allowInlineLineBreaks' => true,
    ],
];
