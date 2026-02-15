<?php

use Carbon\Carbon;
use Dascentral\Rma\Willard;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class WillardMidnightTest extends TestCase
{
    #[Test]
    public function it_calculates_midnight_when_no_date_is_provided()
    {
        $midnight = Willard::midnight();
        $compare = Date('Y-m-d') . ' 00:00:00';
        $this->assertEquals($compare, $midnight->toDateTimeString());
    }

    #[Test]
    public function it_calculates_midnight_when_a_date_is_provided()
    {
        $midnight = Willard::midnight('2030-09-12');
        $this->assertEquals('2030-09-12 00:00:00', $midnight->toDateTimeString());
    }

    #[Test]
    public function it_calculates_midnight_when_a_carbon_object_is_provided()
    {
        $carbon = Carbon::parse('2030-09-12');
        $midnight = Willard::midnight($carbon);
        $this->assertEquals('2030-09-12 00:00:00', $midnight->toDateTimeString());
    }
}
