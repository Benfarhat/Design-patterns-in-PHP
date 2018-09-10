<?php

include_once 'component.php';

$componentA = new Component('Component A');
$componentB = new Component('Component B');
$componentC = new Component('Component C');

/**
 * Something important happens to Component A and so B and C need to take action
 * so each has to be listed ou individually.
 */

 $componentA->doSomething();
 $componentB->doSomething();
 $componentC->doSomething();