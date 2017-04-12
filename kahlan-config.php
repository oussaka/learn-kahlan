<?php

use Kahlan\Filter\Filter;
use Kahlan\Extra\Matcher\ExtraMatchers;

ExtraMatchers::register();
ob_start();
Filter::register('ob_start at each', function($chain) {
    $root = $this->suite();
    $root->beforeEach(function () {
        ob_start();
    });
    return $chain->next();
});
Filter::apply($this, 'run', 'ob_start at each');
