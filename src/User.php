<?php
/**
 * Created by PhpStorm.
 * User: oussaka
 * Date: 12/04/2017
 * Time: 12:29
 */

namespace App;


class User
{

    public function save()
    {
        return (boolean) rand(0, 1);
    }
}