<?php

use Dascentral\Rma\Willard;
use PHPUnit\Framework\TestCase;

class WillardTest extends TestCase
{
    /** @test */
    public function it_calculates_the_first_sunday_of_the_year()
    {
        $sunday = Willard::firstSundayOfYear(2019);
        $this->assertEquals('2019-01-06', $sunday->format('Y-m-d'));

        $sunday = Willard::firstSundayOfYear(2018);
        $this->assertEquals('2018-01-07', $sunday->format('Y-m-d'));

        $sunday = Willard::firstSundayOfYear(2017);
        $this->assertEquals('2017-01-01', $sunday->format('Y-m-d'));
    }

    /** @test */
    public function it_calculates_the_first_week_of_the_year()
    {
        $sunday = Willard::firstWeekOfYear(2018);
        $this->assertEquals('2017-12-31', $sunday->format('Y-m-d'));

        $sunday = Willard::firstWeekOfYear(2017);
        $this->assertEquals('2017-01-01', $sunday->format('Y-m-d'));
    }
}
