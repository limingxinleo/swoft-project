<?php

namespace App\Core\Queue;

use Xin\Swoft\Traits\InstanceTrait;
use Xin\Swoole\Queue\Job;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;

/**
 * @Bean()
 * Class Queue
 * @package App\Core\Queue
 */
class Queue extends Job
{
    use InstanceTrait;

    /**
     * @Value(name="${config.queue.maxProcesses}")
     */
    public $sss = 'xxx';

    public function setSss($sss)
    {
        $this->sss = $sss;
    }

    public function __construct()
    {
        $config = config('queue');
        // 最大进程数
        $this->maxProcesses = $config['maxProcesses'];
        // 子进程最大循环处理次数
        $this->processHandleMaxNumber = $config['processHandleMaxNumber'];
        // 失败的消息
        $this->errorKey = $config['errorKey'];
        // 消息队列Redis键值 list lpush添加队列
        $this->queueKey = $config['queueKey'];
        // 延时消息队列的Redis键值 zset
        $this->delayKey = $config['delayKey'];

        // $config = \Yii::$app->params;
        // if (!isset($config['redis_queue'])) {
        //     throw new ExceptionParams('redis_queue 配置不存在');
        // }
        //
        // $config = $config['redis_queue'];
        // $host = $config['hostname'];
        // $auth = $config['password'];
        // $db = $config['select'];
        // $port = $config['port'];
        //
        // $pidPath = \Yii::$app->getRuntimePath();
        // $logger = new CLogger();
        //
        // $this->setRedisConfig($host, $auth, $db, $port);
        // $this->setPidPath($pidPath . '/queue.pid');
        // $this->setLoggerHandler($logger);

    }
}