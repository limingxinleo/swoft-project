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

use App\Core\Constants\ErrorCode;
use Swoft\Http\Server\Exception\HttpException;
use Throwable;

/**
 * Class HttpServerException
 * @package App\Exception
 */
class HttpServerException extends HttpException implements ExceptionInterface
{
    public function __construct($code, $message = null, Throwable $previous = null)
    {
        if (!isset($message)) {
            $message = ErrorCode::getMessage($code);
        }
        parent::__construct($message, $code, $previous);
    }

    public function getErrorCode()
    {
        return $this->code;
    }
}
