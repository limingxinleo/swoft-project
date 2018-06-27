<?php
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use Swoft\App;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

use Swoft\View\Bean\Annotation\View;
use Swoft\Http\Message\Server\Response;
use Swoft\Http\Message\Server\Request;

/**
 * Class IndexController
 * @Controller
 * @package App\Controllers
 */
class IndexController
{
    /**
     * @RequestMapping(route="/", method={RequestMethod::GET,RequestMethod::POST})
     */
    public function index(Request $request, Response $response): Response
    {
        $name = 'Swoft Framework';
        $notes = [
            'New Generation of PHP Framework',
            'Hign Performance, Coroutine and Full Stack'
        ];
        $links = [
            [
                'name' => 'Home',
                'link' => 'http://www.swoft.org',
            ],
            [
                'name' => 'Documentation',
                'link' => 'http://doc.swoft.org',
            ]
        ];
        $data = compact('name', 'notes', 'links');

        if ($request->getMethod() === 'POST') {
            return $response->json($data);
        }
        return view('index/index', $data);
    }
}
