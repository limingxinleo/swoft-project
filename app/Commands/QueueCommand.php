<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Commands;

use App\Core\Queue\Queue;
use Swoft\Console\Bean\Annotation\Command;
use Swoft\Console\Input\Input;
use Swoft\Console\Output\Output;

/**
 * Queue Command
 * @Command(coroutine=false)
 * @package App\Commands
 */
class QueueCommand
{
    /**
     * 消费队列
     * @Usage {command}
     * @Example {command}
     * @param Input  $input
     * @param Output $output
     * @return int
     */
    public function handle(Input $input, Output $output): int
    {
        $queue = Queue::instance();
        $queue->run();
        return 0;
    }
}
