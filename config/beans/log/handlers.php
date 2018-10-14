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
    'debugHandler' => [
        'class' => FileHandler::class,
        'fileName' => 'debug',
        'logFile' => '@runtime/logs/debug.log',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::INFO,
            \Swoft\Log\Logger::DEBUG,
        ],
    ],
    'traceHandler' => [
        'class' => FileHandler::class,
        'fileName' => 'trace',
        'logFile' => '@runtime/logs/trace.log',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::TRACE,
        ],
    ],
    'noticeHandler' => [
        'class' => FileHandler::class,
        'fileName' => 'notice',
        'logFile' => '@runtime/logs/notice.log',
        'formatter' => '${lineFormatter}',
        'levels' => [
            \Swoft\Log\Logger::NOTICE,
        ],
    ],
    'applicationHandler' => [
        'class' => FileHandler::class,
        'fileName' => 'error',
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
];
