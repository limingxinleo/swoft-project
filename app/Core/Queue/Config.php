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

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;

/**
 * Class Config
 * @Bean()
 * @package App\Core\Queue
 */
class Config
{
    /**
     * 最大进程数
     * @Value(name="${config.queue.maxProcesses}", env="${QUEUE_MAX_PROCESSES}")
     * @var int
     */
    protected $maxProcesses = 2;

    /**
     * 子进程最大循环处理次数
     * @Value(name="${config.queue.processHandleMaxNumber}", env="${QUEUE_PROCESS_HANDLE_MAX_NUMBER}")
     * @var int
     */
    protected $processHandleMaxNumber = 10000;

    /**
     * 失败的消息
     * @Value(name="${config.queue.errorKey}", env="${QUEUE_ERROR_KEY}")
     * @var string
     */
    protected $errorKey = 'swoft:queue:error';

    /**
     * 需要消费的消息
     * @Value(name="${config.queue.queueKey}", env="${QUEUE_QUEUE_KEY}")
     * @var string
     */
    protected $queueKey = 'swoft:queue:queue';

    /**
     * 延时消费的消息
     * @Value(name="${config.queue.delayKey}", env="${QUEUE_DELAY_KEY}")
     * @var string
     */
    protected $delayKey = 'swoft:queue:delay';

    /**
     * @return int
     */
    public function getMaxProcesses(): int
    {
        return $this->maxProcesses;
    }

    /**
     * @param int $maxProcesses
     */
    public function setMaxProcesses(int $maxProcesses)
    {
        $this->maxProcesses = $maxProcesses;
    }

    /**
     * @return int
     */
    public function getProcessHandleMaxNumber(): int
    {
        return $this->processHandleMaxNumber;
    }

    /**
     * @param int $processHandleMaxNumber
     */
    public function setProcessHandleMaxNumber(int $processHandleMaxNumber)
    {
        $this->processHandleMaxNumber = $processHandleMaxNumber;
    }

    /**
     * @return string
     */
    public function getErrorKey(): string
    {
        return $this->errorKey;
    }

    /**
     * @param string $errorKey
     */
    public function setErrorKey(string $errorKey)
    {
        $this->errorKey = $errorKey;
    }

    /**
     * @return string
     */
    public function getQueueKey(): string
    {
        return $this->queueKey;
    }

    /**
     * @param string $queueKey
     */
    public function setQueueKey(string $queueKey)
    {
        $this->queueKey = $queueKey;
    }

    /**
     * @return string
     */
    public function getDelayKey(): string
    {
        return $this->delayKey;
    }

    /**
     * @param string $delayKey
     */
    public function setDelayKey(string $delayKey)
    {
        $this->delayKey = $delayKey;
    }
}
