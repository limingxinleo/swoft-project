<?php
// +----------------------------------------------------------------------
// | Response.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Utils;

use App\Constants\ErrorCode;
use Swoft\Core\RequestContext;
use Swoft\Http\Message\Server\Response as HttpServerResponse;

class Response
{
    /**
     * 返回成功的数据
     */
    public static function success($data): HttpServerResponse
    {
        $response = RequestContext::getResponse();
        return $response->json([
            'code' => 0,
            'data' => $data
        ]);
    }

    /**
     * 返回失败的数据
     */
    public static function fail($code): HttpServerResponse
    {
        $response = RequestContext::getResponse();
        return $response->json([
            'code' => $code,
            'message' => ErrorCode::getMessage($code)
        ]);
    }
}