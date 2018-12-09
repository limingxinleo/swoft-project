<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use Swoft\App;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\View\Bean\Annotation\View;
use Swoft\Http\Message\Server\Response;
use Swoft\Http\Message\Server\Request;
use Swoft\Bean\Annotation\Enum;
use Swoft\Bean\Annotation\ValidatorFrom;

/**
 * Class IndexController
 * @Controller
 * @package App\Controllers
 */
class IndexController extends BaseController
{
    /**
     * @RequestMapping(route="/", method={RequestMethod::GET})
     * @Enum(from=ValidatorFrom::GET, name="type", values={0,1}, default=0)
     */
    public function index(Request $request): Response
    {
        $data = config('message');

        if ($request->input('type') === 0) {
            return $this->response->success($data);
        }
        return view('index/index', $data);
    }
}
