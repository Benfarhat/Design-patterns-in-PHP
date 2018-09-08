<?php

require_once 'vendor/autoload.php';

include_once 'email.php';

// Create a test on Email class with a runtime partial
$email = \Mockery::mock('\Email')->makePartial();

echo '<pre>';
var_dump($email);
/*
class Foo {
    function foo() { return 123; }
    function bar() { return $this->foo(); }
}

$foo = mock(Foo::class)->makePartial();
$foo->foo(); // int(123);

We can then tell the test double to allow or expect calls as with any other Mockery double.

$foo->shouldReceive('foo')->andReturn(456);
$foo->bar(); // int(456)

*/
    
// Expect the method send to be called and should return true
$email->shouldReceive('send')->andReturn(true);

/*

$mock = \Mockery::mock('MyClass');
$mock->shouldReceive('foo')
    ->once()
    ->with($arg)
    ->andReturn($returnValue);
*/

$email->setProperties('test@example.com', 'from@example.com', 'subject', 'This is the body');
$email->send();