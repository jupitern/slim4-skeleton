<?php

namespace App\Http;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SlimCore\App\Http\Controller;

class BaseController extends Controller
{

    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

}