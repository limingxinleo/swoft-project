<?php


namespace App\Core\Logger;

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;

/**
 * 日志配置
 * @Bean
 */
class Config
{
    /**
     * @Value(env="${DOCKER_ENVIRONMENT}")
     * @var bool
     */
    public $dockerEnvironment = false;

    /**
     * @return bool
     */
    public function isDockerEnvironment(): bool
    {
        return $this->dockerEnvironment;
    }
}