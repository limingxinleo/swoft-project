<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use App\Core\HttpServer\Response;
use Swoft\Bean\Annotation\Inject;

/**
 * Class BaseController
 * @package App\Controllers
 */
class BaseController
{
    /**
     * 注入自定义Response
     * @Inject
     *
     * @var Response
     */
    protected $response;
}
