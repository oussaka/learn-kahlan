<?php
/**
 * Created by PhpStorm.
 * User: oussaka
 * Date: 08/04/2017
 * Time: 23:25
 */

use Kahlan\Filter\Filter;

require "reporter.php";

// The logic to inlude into the workflow.
Filter::register('kahlan.myconsole', function($chain) {
    $reporters = $this->reporters();
    $reporters->add('myconsole', new MyReporter(['start' => $this->_start]));
});

/*Filter::register('registering.globals', function($chain) {
    $root = $this->suite(); // The top most suite.
    $root->global = 'MyVariable';
    return $chain->next();
});*/

// Apply our logic to the `'console'` entry point.
Filter::apply($this, 'console', 'kahlan.myconsole');
// Filter::apply($this, 'run', 'registering.globals');
