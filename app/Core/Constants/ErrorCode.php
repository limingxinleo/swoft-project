<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Core\Constants;

use Swoftx\Constants\Constants;

/**
 * Class ErrorCode
 * @package App\Constants
 */
class ErrorCode extends Constants
{
    const SUCCESS = 0;

    /**
     * @Message('服务内部错误')
     */
    const SERVER_ERROR = 500;

    /**
     * @Message('参数验证失败')
     */
    const VALIDATE_FAIL = 600;

    /**
     * @Message('参数错误')
     */
    const PARAMS_ERROR = 1000;
}
