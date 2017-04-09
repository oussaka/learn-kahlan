<?php

/**
 * Created by PhpStorm.
 * User: oussaka
 * Date: 06/04/2017
 * Time: 00:10
 */
namespace App;

class Awesome
{
    private $awesomeDependency;

    public function __construct(AwesomeDependency $awesomeDependency)
    {
        $this->awesomeDependency = $awesomeDependency;
    }

    public function process($data)
    {
        $rand = rand(1, 2);
        if ($rand === 1) {
            return $this->awesomeDependency->process($data);
        }
        return $data;
    }

    public function call($foo)
    {
        return function() use ($foo) {
            return $foo;
        };
    }

    public function toDie($arg)
    {
        if ($arg === 1) {
            return true;
        }

        exit('app exit.');
    }
}