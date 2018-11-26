<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

class Swoft extends \Swoft\App
{
    public static function environment()
    {
        return static::$properties->get('env');
    }
}
