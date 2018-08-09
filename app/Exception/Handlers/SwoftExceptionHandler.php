<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Exception\Handlers;

use App\Core\Constants\ErrorCode;
use App\Core\Logger\ThrowableLogger;
use Swoft\Bean\Annotation\Handler;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Message\Server\Response;
use Swoft\Bean\Annotation\Inject;
use Swoft\Bean\Annotation\ExceptionHandler;
use Swoft\Exception\RuntimeException;
use Exception;
use Swoft\Exception\BadMethodCallException;
use Swoft\Exception\ValidatorException;
use Swoft\Http\Server\Exception\BadRequestException;
use Swoft\Http\Server\Exception\NotAcceptableException;
use Swoft\Http\Server\Exception\RouteNotFoundException;
use App\Exception\NoContentException;

/**
 * the handler of global exception
 *
 * @ExceptionHandler()
 * @uses      Handler
 * @version   2018年01月14日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class SwoftExceptionHandler
{
    /**
     * 注入自定义Response
     * @Inject()
     *
     * @var \App\Core\HttpServer\Response
     */
    private $response;

    /**
     * @Inject
     * @var ThrowableLogger
     */
    private $logger;

    /**
     * @Handler(Exception::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerException(Response $response, \Throwable $throwable)
    {
        $file = $throwable->getFile();
        $line = $throwable->getLine();
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        $this->logger->error($throwable);

        return $this->response->fail(ErrorCode::SERVER_ERROR, $exception);
    }

    /**
     * @Handler(RuntimeException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerRuntimeException(Response $response, \Throwable $throwable)
    {
        $file = $throwable->getFile();
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        $this->logger->error($throwable);

        return $this->response->fail(ErrorCode::SERVER_ERROR, $exception);
    }

    /**
     * @Handler(ValidatorException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerValidatorException(Response $response, \Throwable $throwable)
    {
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        $this->logger->warning($throwable);

        return $this->response->fail(ErrorCode::VALIDATE_FAIL, $exception);
    }

    /**
     * @Handler(BadRequestException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerBadRequestException(Response $response, \Throwable $throwable)
    {
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        $this->logger->warning($throwable);

        return $this->response->fail($code, $exception);
    }

    /**
     * @Handler(NotAcceptableException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerNotAcceptableException(Response $response, \Throwable $throwable)
    {
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        $this->logger->notice($throwable);

        return $this->response->fail($code, $exception);
    }

    /**
     * @Handler(RouteNotFoundException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerRouteNotFoundException(Response $response, \Throwable $throwable)
    {
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        $this->logger->notice($throwable);

        return $this->response->fail($code, $exception);
    }

    /**
     * @Handler(NoContentException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerNoContentException(Response $response, \Throwable $throwable)
    {
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        $this->logger->debug($throwable);

        return $this->response->fail($code, $exception);
    }

    /**
     * @Handler(BadMethodCallException::class)
     *
     * @param Request    $request
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerViewException(Request $request, Response $response, \Throwable $throwable)
    {
        $name = $throwable->getMessage() . $request->getUri()->getPath();
        $notes = [
            'New Generation of PHP Framework',
            'Hign Performance, Coroutine and Full Stack',
        ];
        $links = [
            [
                'name' => 'Home',
                'link' => 'http://www.swoft.org',
            ],
            [
                'name' => 'Documentation',
                'link' => 'http://doc.swoft.org',
            ],
            [
                'name' => 'Case',
                'link' => 'http://swoft.org/case',
            ],
            [
                'name' => 'Issue',
                'link' => 'https://github.com/swoft-cloud/swoft/issues',
            ],
            [
                'name' => 'GitHub',
                'link' => 'https://github.com/swoft-cloud/swoft',
            ],
        ];
        $data = compact('name', 'notes', 'links');

        return view('index/index', $data);
    }
}
