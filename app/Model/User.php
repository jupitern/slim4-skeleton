<?php

namespace App\Model;
use SlimCore\Utils\EloquentModel;

class User extends EloquentModel
{

    protected $table = 'users';
    public $timestamps = false;

}
