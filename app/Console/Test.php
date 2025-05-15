<?php

namespace App\Console;
use SlimCore\App\Console\Command as BaseCommand;

class Test extends BaseCommand
{

    public function method($a, $b='foobar')
    {
        return
            "\nEntered console command with params: \n".
            "a= {$a}\n".
            "b= {$b}\n";
    }

}