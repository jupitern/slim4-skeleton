<?php

namespace App\Middleware;

use Psr\Http\Message\{ServerRequestInterface as Request, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use SlimCore\Middleware\Middleware;
use Slim\Routing\RouteContext;

class CheckAccess extends Middleware
{

    public function process(Request $request, RequestHandler $handler): ResponseInterface
    {
        $routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();
        $resource = trim($route->getPattern(), "/");

        // your rbac login here...

        return $handler->handle($request);
    }

}
