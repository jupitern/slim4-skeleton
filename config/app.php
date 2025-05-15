<?php

use Psr\Log\LogLevel;
use SlimCore\App;

return [
    'locale'        => 'pt_PT',
    'timezone'      => 'Europe/Lisbon',
    'debug'         => true,
    'consoleOutput' => true,
    'baseUrl'       => '/',   // url config. Url must end with a slash '/'
    'indexFile'     => false,
    'routerCacheFile' => null,
    'middleware' => [
        \SlimCore\Middleware\Session::class => "http",
        \App\Middleware\CheckAccess::class => "http",
        // \SlimCore\Middleware\ValidateJson::class => "http",
        // \Slim\Middleware\ContentLengthMiddleware::class => "http",
    ],
    'session' => [
        'lifetime'      => 60 * 60 * 2,
        'save_handler'  => 'files',
        'save_path'     => STORAGE_PATH.'sessions'.DS,
        //'save_handler'  => 'redis',
        //'save_path'     => 'tcp://'.App::env('REDIS_HOST').':'.App::env('REDIS_PORT').'?auth='.App::env('REDIS_PASSWORD').'&database='.App::env('REDIS_DATABASE'),
    ],
    'services' => [
        'trace' => [
            'provider' => \SlimCore\ServiceProviders\Trace::class,
        ],
        'logger' => [
            'provider' => \SlimCore\ServiceProviders\Monolog::class,
            'settings' => [
                [
                    'type'      => 'file',
                    'enabled'   => true,
                    'level'     => LogLevel::ERROR,
                    'path'      => STORAGE_PATH . 'logs' . DS . date('Ymd') . ".log",
                ],
            ],
        ],
        'view' => [
            'provider' => \SlimCore\ServiceProviders\Plates::class,
            'settings' => [
                'templates' => [
                    'http'      => VIEWS_PATH . DS . "http",
                    'console'   => VIEWS_PATH . DS . "console",
                ],
                'extensions' => [
                    \SlimCore\Utils\PlatesCacheExtension::class,
                ]
            ],
        ],
        'fs_local' => [
            'provider' => \SlimCore\ServiceProviders\Filesystem::class,
            'settings' => [
                'driver' => 'local',
                'root'   => ROOT_PATH,
            ],
        ],
        'db' => [
            'provider' => \SlimCore\ServiceProviders\IlluminateDatabase::class,
            'settings' => [
                'driver'    => 'sqlsrv',
                'host'      => App::env('DB_HOST'),
                'username'  => App::env('DB_USER'),
                'password'  => App::env('DB_PASS'),
                'database'  => App::env('DB_NAME'),
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'profiling' => true,
                'inisql'    => ['SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED'],
            ],
        ],
        'redis' => [
            'provider' =>  \SlimCore\ServiceProviders\Redis::class,
            'settings' => [
                'active'    => true,
                'scheme'    => 'tcp',
                'host'      => App::env('REDIS_HOST'),
                'port'      => App::env('REDIS_PORT'),
                'database'  => App::env('REDIS_DATABASE'),
                'password'  => App::env('REDIS_PASSWORD'),
            ],
        ],
        'mail' => [
            'provider' => \SlimCore\ServiceProviders\Mailer::class,
            'settings' => [
                'host'     => App::env('EMAIL_HOST'),
                'port'     => App::env('EMAIL_PORT'),
                'secure'   => true,
                'username' => App::env('EMAIL_USER'),
                'password' => App::env('EMAIL_PASS'),
                'from'     => App::env('EMAIL_FROM'),
                'fromName' => App::env('EMAIL_NAME', 'Website'),
            ]
        ],
    ],
    // app specific settings
    'app' => [

    ],
];

