<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Exception;

use Swoft\Http\Server\Exception\HttpException;

/**
 * Class NoContentException
 * @package App\Exception
 */
class NoContentException extends HttpException
{
    protected $code = 204;
}
