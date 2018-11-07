<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Commands;

use Swoft\Console\Bean\Annotation\Command;
use Swoft\Console\Input\Input;
use Swoft\Console\Output\Output;

/**
 * This is a init command
 * @Command(coroutine=false)
 * @package App\Commands
 */
class InitCommand
{
    /**
     * init env
     * @Usage {command}
     * @Example {command}
     * @param Input  $input
     * @param Output $output
     * @return int
     */
    public function env(Input $input, Output $output): int
    {
        $ip = $input->getArg('ip');
        if (empty($ip)) {
            $shell = "/sbin/ifconfig -a|grep inet|grep -v 127.0.0.1|grep -v inet6|awk '{print $2}'|tr -d 'addr:'|head -1";
            $ip = exec($shell);
        }

        $output->colored('inet ip: ' . $ip);
        $root = alias('@root');
        $env = file_get_contents($root . '/.env');
        $env = preg_replace_callback('/(CONSUL_REGISTER_SERVICE_ADDRESS|CONSUL_REGISTER_CHECK_TCP)=\d+\.\d+\.\d+\.\d+/', function ($matches) use ($ip) {
            return $matches[1] . '=' . $ip;
        }, $env);

        file_put_contents($root . '/.env', $env);
        $output->colored('init CONSUL_REGISTER_SERVICE_ADDRESS success');
        return 0;
    }
}
