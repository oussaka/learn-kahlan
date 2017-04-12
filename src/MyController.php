<?php
/**
 * Created by PhpStorm.
 * User: oussaka
 * Date: 12/04/2017
 * Time: 12:28
 */

namespace App;

class MyController
{
    public function save()
    {
        $user = new User();
        if (!$user->save()) {
            echo 'not saved';
            return;
        }

        echo 'saved';
    }
}