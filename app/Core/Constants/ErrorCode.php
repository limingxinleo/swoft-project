<?php
// +----------------------------------------------------------------------
// | ErrorCode.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Core\Constants;

use Xin\Phalcon\Enum\Enum;

/**
 * Class ErrorCode
 * @package App\Constants
 */
class ErrorCode extends Enum
{
    const SERVER_ERROR = 500;

    const VALIDATE_FAIL = 600;

    /**
     * @Message('参数错误')
     */
    public static $ENUM_PARAMS_ERROR = 1000;
}
