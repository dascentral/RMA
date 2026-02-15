<?php

use Dascentral\Rma\Willard;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class WillardWeekdaysTest extends TestCase
{
    #[Test]
    public function it_returns_monday_when_sunday_is_provided()
    {
        $weekdays = Willard::weekdays(1, Willard::sunday());
        $compare = Willard::sunday()->addDay()->format('l');
        $this->assertEquals($compare, $weekdays[0]->format('l'));
    }

    #[Test]
    public function it_returns_the_start_of_day_for_each_weekday()
    {
        $compare = '00:00:00';

        $weekdays = Willard::weekdays();
        $this->assertEquals($compare, $weekdays[0]->format('H:i:s'));

        $weekdays = Willard::weekdays(1, Willard::sunday());
        $this->assertEquals($compare, $weekdays[0]->format('H:i:s'));
    }
}
