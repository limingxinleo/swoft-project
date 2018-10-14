<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Core\Queue;

use Swoft\App;
use Swoft\Redis\Exception\RedisException;
use Swoft\Redis\Pool\Config\RedisPoolConfig;
use Swoft\Redis\Pool\RedisPool;
use Swoft\Redis\Redis;
use Xin\Swoft\Traits\InstanceTrait;
use Xin\Swoole\Queue\Job;
use Xin\Swoole\Queue\JobInterface;

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

        list($host, $port, $auth, $db) = $this->getRedisConfig();

        $pidPath = alias('@runtime');

        $logger = bean('queueLogger');

        $this->setRedisConfig($host, $auth, $db, $port);
        $this->setPidPath($pidPath . '/queue.pid');
        $this->setLoggerHandler($logger);
    }

    public function countCurrentJobs()
    {
        $redis = $this->getRedisChildClient();
        return $redis->lLen($this->queueKey);
    }

    /**
     * @return array
     * @throws RedisException
     */
    protected function getRedisConfig(): array
    {
        $pool = bean(RedisPool::class);
        $uri = $pool->getConnectionAddress();
        /** @var RedisPoolConfig $config */
        $config = $pool->getPoolConfig();
        $parseAry = parse_url($uri);
        if (!isset($parseAry['host']) || !isset($parseAry['port'])) {
            $error = sprintf('Redis Connection format is incorrect uri=%s, eg:tcp://127.0.0.1:6379/1?auth=password', $uri);
            throw new RedisException($error);
        }

        $query = $parseAry['query'] ?? '';
        parse_str($query, $options);
        $configs = array_merge($parseAry, $options);

        $host = $configs['host'];
        $port = $configs['port'];
        $auth = $configs['auth'] ?? null;
        $db = $config->getDb();

        return [$host, $port, $auth, $db];
    }

    public function push(JobInterface $job)
    {
        $redis = bean(Redis::class);
        $packer = $this->getPacker();
        return $redis->lpush($this->queueKey, $packer->pack($job));
    }

    public function delay(JobInterface $job, $time = 0)
    {
        if (empty($time)) {
            return $this->push($job);
        }

        $redis = bean(Redis::class);
        $packer = $this->getPacker();
        return $redis->zAdd($this->delayKey, time() + $time, $packer->pack($job));
    }
}
