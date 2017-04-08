<?php

namespace App;

class Bear
{
    CONST SLEEP_HOUR_24HOURTIME = 21;

    private $hugger;

    public function __construct(Huggable $hugger)
    {
        $this->hugger = $hugger;
    }

    public static function wrath()
    {
        return "WRAAAAATH";
    }

    public static function isSleepy()
    {
        return date('H', time()) >= self::SLEEP_HOUR_24HOURTIME;
    }

    public function doHug()
    {
        return (string) $this->hugger->hug();
    }
}
