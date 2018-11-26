<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases;

use App\Core\Constants\Swoft;
use Swoft\Test\AbstractTestCase;

class ExampleTest extends AbstractTestCase
{
    public function testExample()
    {
        $this->assertEquals(Swoft::APP_ENV_PROD, \Swoft::environment());
    }
}
