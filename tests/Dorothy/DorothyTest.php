<?php

use Dascentral\Rma\Dorothy;
use PHPUnit\Framework\TestCase;

class DorothyTest extends TestCase
{
    /** @test */
    public function it_rounds_down_correctly()
    {
        $this->assertEquals(50, Dorothy::roundDowntoNearest(50, 5));
        $this->assertEquals(50, Dorothy::roundDowntoNearest(51, 5));
        $this->assertEquals(50, Dorothy::roundDowntoNearest(52, 5));
        $this->assertEquals(50, Dorothy::roundDowntoNearest(53, 5));
        $this->assertEquals(50, Dorothy::roundDowntoNearest(54, 5));
        $this->assertEquals(55, Dorothy::roundDowntoNearest(55, 5));
        $this->assertEquals(55, Dorothy::roundDowntoNearest(56, 5));
        $this->assertEquals(55, Dorothy::roundDowntoNearest(57, 5));
        $this->assertEquals(55, Dorothy::roundDowntoNearest(58, 5));
        $this->assertEquals(55, Dorothy::roundDowntoNearest(59, 5));
        $this->assertEquals(60, Dorothy::roundDowntoNearest(60, 5));
    }

    /** @test */
    public function it_rounds_up_correctly()
    {
        $this->assertEquals(50, Dorothy::roundUptoNearest(46, 5));
        $this->assertEquals(50, Dorothy::roundUptoNearest(47, 5));
        $this->assertEquals(50, Dorothy::roundUptoNearest(48, 5));
        $this->assertEquals(50, Dorothy::roundUptoNearest(49, 5));
        $this->assertEquals(50, Dorothy::roundUptoNearest(50, 5));
        $this->assertEquals(55, Dorothy::roundUptoNearest(51, 5));
        $this->assertEquals(55, Dorothy::roundUptoNearest(52, 5));
        $this->assertEquals(55, Dorothy::roundUptoNearest(53, 5));
        $this->assertEquals(55, Dorothy::roundUptoNearest(54, 5));
        $this->assertEquals(55, Dorothy::roundUptoNearest(55, 5));
        $this->assertEquals(60, Dorothy::roundUptoNearest(56, 5));
        $this->assertEquals(60, Dorothy::roundUptoNearest(57, 5));
        $this->assertEquals(60, Dorothy::roundUptoNearest(58, 5));
        $this->assertEquals(60, Dorothy::roundUptoNearest(59, 5));
        $this->assertEquals(60, Dorothy::roundUptoNearest(60, 5));
    }
}
