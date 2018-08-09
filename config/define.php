<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

!defined('DS') && define('DS', DIRECTORY_SEPARATOR);
// App name
!defined('APP_NAME') && define('APP_NAME', 'Swoft');
// Project base path
!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

// Register alias
$aliases = [
    '@root' => BASE_PATH,
    '@env' => '@root',
    '@app' => '@root/app',
    '@res' => '@root/resources',
    '@runtime' => '@root/runtime',
    '@configs' => '@root/config',
    '@resources' => '@root/resources',
    '@beans' => '@configs/beans',
    '@properties' => '@configs/properties',
    '@console' => '@beans/console.php',
    '@commands' => '@app/command',
    '@vendor' => '@root/vendor',
];

\Swoft\App::setAliases($aliases);
