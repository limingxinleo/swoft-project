<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Pool;

use App\Pool\Config\ServicePoolConfig;
use Swoft\Bean\Annotation\Inject;
use Swoft\Bean\Annotation\Pool;
use Swoft\Rpc\Client\Pool\ServicePool as SwoftServicePool;

/**
 * the pool of user service
 *
 * @Pool(name="default")
 */
class ServicePool extends SwoftServicePool
{
    /**
     * @Inject()
     *
     * @var ServicePoolConfig
     */
    protected $poolConfig;
}
