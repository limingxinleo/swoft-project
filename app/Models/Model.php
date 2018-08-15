<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Models;

use Swoft\Db\Model as SwoftModel;
use Swoftx\Db\Entity\ModelCacheable;

class Model extends SwoftModel
{
    use ModelCacheable;
}
