<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response, $args) use($app) {
    return $app->resolveRoute([\App\Http\Welcome::class, "index"], $args);
});

// route example with optional named placeholder
// calling http://localhost:8080/index.php/test/john with the route bellow
// injects the :name param value into the method $name parameter
$app->get('/welcome[/{name}]', function(Request $request, Response $response, $args) use($app) {
    return $app->resolveRoute([\App\Http\Welcome::class, "index"], $args);
});
