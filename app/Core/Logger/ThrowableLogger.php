<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Core\Logger;

use Swoft\App;
use Swoft\Log\Logger;
use Throwable;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;

/**
 * Class Logger
 * @Bean
 * @package App\Core\Logger
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
        return sprintf(
            "%s:%s(%s) in %s:%s\nStack trace:\n%s",
            get_class($throwable),
            $throwable->getMessage(),
            $throwable->getCode(),
            $throwable->getFile(),
            $throwable->getLine(),
            $throwable->getTraceAsString()
        );
    }

    public function __call($name, $arguments)
    {
        if (isset($arguments[0]) && $arguments[0] instanceof Throwable) {
            $this->logger->$name($this->format($arguments[0]));
        }
    }

    public function getLogger()
    {
        return $this->logger;
    }
}
