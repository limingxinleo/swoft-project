<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

use hiqdev\composer\config\Builder;

$config = require Builder::path('swoft.components');

return [
    'custom' => $config['custom'],
];
