<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Core\HttpServer;

use App\Core\Constants\ErrorCode;
use Swoft\Bean\Annotation\Bean;
use Swoft\Core\RequestContext;
use Swoft\Http\Message\Server\Response as HttpServerResponse;

/**
 * @Bean()
 * Class Response
 * @author  limx
 * @package App\Core\HttpServer
 */
class Response
{
    /**
     * 返回成功的数据
     * @author limx
     * @param array $data
     * @return HttpServerResponse
     */
    public function success($data = null): HttpServerResponse
    {
        $response = RequestContext::getResponse();
        return $response->json([
            'code' => ErrorCode::SUCCESS,
            'data' => $data
        ]);
    }

    /**
     * 返回失败的数据
     * @author limx
     * @param      $code
     * @param null $message
     * @return HttpServerResponse
     */
    public function fail($code, $message = null): HttpServerResponse
    {
        if (empty($message)) {
            $message = ErrorCode::getMessage($code);
        }
        $response = RequestContext::getResponse();
        return $response->json([
            'code' => $code,
            'message' => $message
        ]);
    }
}
