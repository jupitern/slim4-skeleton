<?php

use Dotenv\Exception\InvalidPathException;

error_reporting(E_ALL);

const DS = DIRECTORY_SEPARATOR;
define('ROOT_PATH', realpath(__DIR__) . DS);
define('APP_PATH', realpath(__DIR__ . DS.'app') . DS);
define('LIB_PATH', realpath(__DIR__ . DS.'lib') . DS);
define('CONFIG_PATH', realpath(__DIR__ . DS.'config') . DS);
define('VIEWS_PATH', realpath(__DIR__ .DS.'views') . DS);
define('STORAGE_PATH', realpath(__DIR__ .DS.'storage') . DS);
define('PUBLIC_PATH', realpath(__DIR__ .DS.'public') . DS);

require ROOT_PATH.'vendor'.DS.'autoload.php';

$app = app();
app()->startTime = microtime(true);
try {
    $app->loadEnv(ROOT_PATH, $app->determineEnvFilename(".env"));
} catch (InvalidPathException $e) {
    die("Error reading environment file");
}

$configs = require CONFIG_PATH . 'app.php';
$app->setConfigs(require CONFIG_PATH . 'app.php');