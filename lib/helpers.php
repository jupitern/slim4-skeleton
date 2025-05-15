<?php

use Illuminate\Database\Connection;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use SlimCore\App;
use SlimCore\Utils\Session;

function app(ContainerInterface $container = null): App
{
    return App::instance($container);
}


function db(string $connectionName = 'db'): Connection
{
    return app()->resolve($connectionName);
}


function sessionUserId(): ?int
{
    if (app()->isConsole()) return null;
    $user = Session::get('user');
    
    return $user['UserID'] ?? null;
}


/**
 * log a message
 * @throws ReflectionException
 */
function addLog(mixed $level, mixed $message, array $context = []): void
{
    if (!app()->has('logger')) return;

    if (is_object($message) || is_array($message)) {
        $message = json_encode($message);
    }

    /** @var LoggerInterface $logger */
    $logger = app()->resolve('logger');
    $logger->log($level, $message, $context);
}


/**
 * add a message for trace
 * @throws ReflectionException
 */
function addTrace(mixed $message): void
{
    if (!app()->has('trace')) return;

    if (is_object($message) || is_array($message)) {
        $message = json_encode($message);
    }

    app()->resolve('trace')->add($message);
}


function baseUrl(?bool $showIndex = null): string
{
    return app()->url('', $showIndex);
}


function url(string $url = '', ?bool $showIndex = null, bool $includeBaseUrl = true): string
{
    return app()->url($url, $showIndex, $includeBaseUrl);
}


/**
 * output a variable, array or object
 */
function debug(mixed $var, bool $exit = false, bool $return = false, string $separator = null): string
{
    $inConsole = php_sapi_name() == 'cli';
    $log = "";

    if ($separator === null) {
        $separator = $inConsole ? "\n" : "<br/>";
    }

    if (!$inConsole) {
        $log .= '<pre>';
    }

    if (is_array($var)) {
        $log .= print_r($var, true);
    } elseif (is_object($var) || is_bool($var) || is_null($var)) {
        ob_start();
        var_dump($var);
        $log .= ob_get_clean();
    } else {
        $log .= $var;
    }

    if (!$inConsole) {
        $log .= '</pre>';
    }

    if (!$return) {
        echo $log . $separator;
    }
    if ($exit) {
        exit();
    }

    return $log . $separator;
}

/**
 * output a variable, array or object
 */
function dd($var): string
{
    return debug($var, true);
}
