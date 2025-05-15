<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use SlimCore\App\Console\CommandRouter;

// automatic console command resolver
$app->get('/command', function (Request $request, Response $response, $args) use ($app) {

    $commandrouter = new CommandRouter($app);
    return $commandrouter->execute($GLOBALS['argv']);

});