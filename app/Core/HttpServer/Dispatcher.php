<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Core\HttpServer;

use Swoft\Http\Server\ServerDispatcher;

class Dispatcher extends ServerDispatcher
{
    protected function afterDispatch($response)
    {
        parent::afterDispatch($response);
    }
}
