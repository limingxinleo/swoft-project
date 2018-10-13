<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Listener;

use App\Exception\NoContentException;
use Swoft\Bean\Annotation\Listener;
use Swoft\Core\RequestContext;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Message\Server\Response;
use Swoft\Http\Server\Event\HttpServerEvent;

/**
 * Class BeforeRequestListener
 *
 * @Listener(HttpServerEvent::BEFORE_REQUEST)
 * @package App\Listener
 */
class BeforeRequestListener implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        /** @var Request $request */
        $request = RequestContext::getRequest();
        /** @var Response $response */
        $response = RequestContext::getResponse();

        // 处理跨域
        $response = $response->withHeaders([
            'Access-Control-Allow-Origin' => $request->getHeader('Origin')[0] ?? '',
            'Access-Control-Allow-Credentials' => true,
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Accept,Cache-Control,Content-Type,DNT,Keep-Alive,Origin,User-Agent',
        ]);
        RequestContext::setResponse($response);

        // 请求为OPTIONS时，直接返回204
        if ($request->getMethod() == 'OPTIONS') {
            throw new NoContentException();
        }
    }
}
