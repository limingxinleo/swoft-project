<?php

namespace App\Core\Logger;

use Swoft\App;
use Swoft\Log\Logger;
use Throwable;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;

/**
 * Class Logger
 * @Bean
 * @package App\Core\Helpers
 */
class ThrowableLogger
{
    /**
     * @Inject("logger")
     * @var Logger
     */
    protected $logger;

    /**
     * 格式化 $throwable
     * @author limx
     * @param Throwable $throwable
     * @return string
     */
    protected function format(Throwable $throwable): string
    {
        return (string)$throwable;
    }

    public function __call($name, $arguments)
    {
        if (isset($arguments[0]) && $arguments[0] instanceof Throwable) {
            $this->logger->$name($this->format($arguments[0]));
        }
    }
}