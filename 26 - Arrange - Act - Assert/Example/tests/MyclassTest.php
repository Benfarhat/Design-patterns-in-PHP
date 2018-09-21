<?php

namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Myclass;

class MyclassTest extends TestCase 
{
    private $Myclass;

    public function setUp(){
        $this->Myclass = new Myclass();
    }

    public function tearDown() {
        unset($this->Myclass);
    }
    public function testTotal(){
        $input = [0,2,5,8,16,4];
        $output = $this->Myclass->total($input);
        $this->assertEquals(
            35,
            $output,
            'Summing the total should equal 35'
        );
    }
}