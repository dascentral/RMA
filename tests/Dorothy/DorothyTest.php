<?php

use Dascentral\Rma\Dorothy;
use PHPUnit\Framework\TestCase;

class DorothyTest extends TestCase
{
    /** @test */
    public function it_rounds_down_correctly()
    {
        $this->assertEquals(50, Dorothy::roundDownToNearest(50, 5));
        $this->assertEquals(50, Dorothy::roundDownToNearest(51, 5));
        $this->assertEquals(50, Dorothy::roundDownToNearest(52, 5));
        $this->assertEquals(50, Dorothy::roundDownToNearest(53, 5));
        $this->assertEquals(50, Dorothy::roundDownToNearest(54, 5));
        $this->assertEquals(55, Dorothy::roundDownToNearest(55, 5));
        $this->assertEquals(55, Dorothy::roundDownToNearest(56, 5));
        $this->assertEquals(55, Dorothy::roundDownToNearest(57, 5));
        $this->assertEquals(55, Dorothy::roundDownToNearest(58, 5));
        $this->assertEquals(55, Dorothy::roundDownToNearest(59, 5));
        $this->assertEquals(60, Dorothy::roundDownToNearest(60, 5));
    }

    /** @test */
    public function it_rounds_correctly()
    {
        $this->assertEquals(45, Dorothy::roundToNearest(45, 5));
        $this->assertEquals(45, Dorothy::roundToNearest(46, 5));
        $this->assertEquals(45, Dorothy::roundToNearest(47, 5));
        $this->assertEquals(50, Dorothy::roundToNearest(48, 5));
        $this->assertEquals(50, Dorothy::roundToNearest(49, 5));
        $this->assertEquals(50, Dorothy::roundToNearest(50, 5));
        $this->assertEquals(50, Dorothy::roundToNearest(51, 5));
        $this->assertEquals(50, Dorothy::roundToNearest(52, 5));
        $this->assertEquals(55, Dorothy::roundToNearest(53, 5));
        $this->assertEquals(55, Dorothy::roundToNearest(54, 5));
        $this->assertEquals(55, Dorothy::roundToNearest(55, 5));
        $this->assertEquals(55, Dorothy::roundToNearest(56, 5));
        $this->assertEquals(55, Dorothy::roundToNearest(57, 5));
        $this->assertEquals(60, Dorothy::roundToNearest(58, 5));
        $this->assertEquals(60, Dorothy::roundToNearest(59, 5));
        $this->assertEquals(60, Dorothy::roundToNearest(60, 5));
    }

    /** @test */
    public function it_rounds_up_correctly()
    {
        $this->assertEquals(50, Dorothy::roundUpToNearest(46, 5));
        $this->assertEquals(50, Dorothy::roundUpToNearest(47, 5));
        $this->assertEquals(50, Dorothy::roundUpToNearest(48, 5));
        $this->assertEquals(50, Dorothy::roundUpToNearest(49, 5));
        $this->assertEquals(50, Dorothy::roundUpToNearest(50, 5));
        $this->assertEquals(55, Dorothy::roundUpToNearest(51, 5));
        $this->assertEquals(55, Dorothy::roundUpToNearest(52, 5));
        $this->assertEquals(55, Dorothy::roundUpToNearest(53, 5));
        $this->assertEquals(55, Dorothy::roundUpToNearest(54, 5));
        $this->assertEquals(55, Dorothy::roundUpToNearest(55, 5));
        $this->assertEquals(60, Dorothy::roundUpToNearest(56, 5));
        $this->assertEquals(60, Dorothy::roundUpToNearest(57, 5));
        $this->assertEquals(60, Dorothy::roundUpToNearest(58, 5));
        $this->assertEquals(60, Dorothy::roundUpToNearest(59, 5));
        $this->assertEquals(60, Dorothy::roundUpToNearest(60, 5));
    }
}
