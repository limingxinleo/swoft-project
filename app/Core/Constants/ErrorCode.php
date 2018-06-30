<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

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
