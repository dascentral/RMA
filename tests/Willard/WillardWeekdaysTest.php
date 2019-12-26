<?php

use Dascentral\Rma\Willard;
use PHPUnit\Framework\TestCase;

class WillardWeekdaysTest extends TestCase
{
    /** @test */
    public function it_returns_monday_when_sunday_is_provided()
    {
        $weekdays = Willard::weekdays(1, Willard::sunday());
        $compare = Willard::sunday()->addDay()->format('l');
        $this->assertEquals($compare, $weekdays[0]->format('l'));
    }
}
