<?php

use Dascentral\Rma\Willard;
use PHPUnit\Framework\TestCase;

class WillardTimesTest extends TestCase
{
    /** @test */
    public function it_generates_an_array_of_times_when_an_interval_is_provided()
    {
        $times = Willard::times('10:00', '18:00', 600);
        $this->assertEquals(49, count($times));
    }

    /** @test */
    public function it_generates_an_array_of_times_when_an_interval_is_not_provided()
    {
        $times = Willard::times('10:00', '12:00');
        $this->assertEquals(9, count($times));
    }
}
