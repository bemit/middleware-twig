<?php

namespace Orbiter\MiddlewareTwig;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MiddlewareTwig implements MiddlewareInterface {

    protected $data;

    public function __construct($data = []) {
        $this->data = $data;
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler
     *
     * @throws \Exception
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        $twig_data = $request->getAttribute('twig_data');

        $resp = $handler->handle($request);

        return $resp;
    }
}
