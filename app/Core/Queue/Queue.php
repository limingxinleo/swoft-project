<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Core\Queue;

use Swoft\App;
use Xin\Swoft\Traits\InstanceTrait;
use Xin\Swoole\Queue\Job;

/**
 * Class Queue
 * @package App\Core\Queue
 */
class Queue extends Job
{
    use InstanceTrait;

    public function __construct()
    {
        /** @var Config $config */
        $config = bean(Config::class);
        $this->maxProcesses = $config->getMaxProcesses();
        $this->processHandleMaxNumber = $config->getProcessHandleMaxNumber();
        $this->errorKey = $config->getErrorKey();
        $this->queueKey = $config->getQueueKey();
        $this->delayKey = $config->getDelayKey();


        $host = $config->getHost();
        $auth = $config->getAuth();
        $db = $config->getDb();
        $port = $config->getPort();

        $pidPath = alias('@runtime');

        $logger = App::getLogger();

        $this->setRedisConfig($host, $auth, $db, $port);
        $this->setPidPath($pidPath . '/queue.pid');
        $this->setLoggerHandler($logger);
    }
}
