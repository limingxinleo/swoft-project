<?php
// +----------------------------------------------------------------------
// | HttpServerException.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Exception;

use App\Core\Constants\ErrorCode;
use Exception;
use Throwable;

/**
 * Class HttpServerException
 * @package App\Exception
 */
class HttpServerException extends Exception implements ExceptionInterface
{
    public function __construct($code = 0, $message = null, Throwable $previous = null)
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
