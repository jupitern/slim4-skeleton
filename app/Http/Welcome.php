<?php

namespace App\Http;

class Welcome extends BaseController
{

    public function index($name = '')
    {
        return app()->view->render('http::welcome', ['name' => $name]);
    }

    public function method($name = '')
    {
        return app()->view->render('http::welcome', ['name' => $name]);
    }
}
