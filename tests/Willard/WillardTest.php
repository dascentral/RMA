<?php

use Carbon\Carbon;
use Dascentral\Rma\Willard;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class WillardTest extends TestCase
{
    #[Test]
    public function it_calculates_the_first_sunday_of_the_year()
    {
        $sunday = Willard::firstSundayOfYear(2019);
        $this->assertEquals('2019-01-06', $sunday->format('Y-m-d'));

        $sunday = Willard::firstSundayOfYear(2018);
        $this->assertEquals('2018-01-07', $sunday->format('Y-m-d'));

        $sunday = Willard::firstSundayOfYear(2017);
        $this->assertEquals('2017-01-01', $sunday->format('Y-m-d'));
    }

    #[Test]
    public function it_calculates_the_first_week_of_the_year()
    {
        $sunday = Willard::firstWeekOfYear(2019);
        $this->assertEquals('2018-12-30', $sunday->format('Y-m-d'));

        $sunday = Willard::firstWeekOfYear(2018);
        $this->assertEquals('2017-12-31', $sunday->format('Y-m-d'));

        $sunday = Willard::firstWeekOfYear(2017);
        $this->assertEquals('2017-01-01', $sunday->format('Y-m-d'));
    }

    #[Test]
    public function it_calculates_my_version_of_diff_for_humans()
    {
        $date = date('Y-m-d');
        $this->assertEquals('Today', Willard::human($date));

        $date = Carbon::now()->addDays(1)->format('Y-m-d');
        $this->assertEquals('Tomorrow', Willard::human($date));

        $date = Carbon::now()->subDays(1)->format('Y-m-d');
        $this->assertEquals('Yesterday', Willard::human($date));

        // Day name

        // Last day name

        // ELSE
    }

    #[Test]
    public function it_correctly_calculates_sunday()
    {
        $sunday = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $this->assertEquals($sunday, Willard::sunday());

        $this->assertEquals('2019-02-24', Willard::sunday('2019-02-24')->format('Y-m-d'));
        $this->assertEquals('2019-02-24', Willard::sunday('2019-02-25')->format('Y-m-d'));
        $this->assertEquals('2019-02-24', Willard::sunday('2019-02-26')->format('Y-m-d'));
        $this->assertEquals('2019-02-24', Willard::sunday('2019-02-27')->format('Y-m-d'));
        $this->assertEquals('2019-02-24', Willard::sunday('2019-02-28')->format('Y-m-d'));
        $this->assertEquals('2019-02-24', Willard::sunday('2019-03-01')->format('Y-m-d'));
        $this->assertEquals('2019-02-24', Willard::sunday('2019-03-02')->format('Y-m-d'));

        $this->assertEquals('2019-03-10', Willard::sunday('2019-03-10')->format('Y-m-d'));
        $this->assertEquals('2019-03-10', Willard::sunday('2019-03-11')->format('Y-m-d'));
        $this->assertEquals('2019-03-10', Willard::sunday('2019-03-12')->format('Y-m-d'));
        $this->assertEquals('2019-03-10', Willard::sunday('2019-03-13')->format('Y-m-d'));
        $this->assertEquals('2019-03-10', Willard::sunday('2019-03-14')->format('Y-m-d'));
        $this->assertEquals('2019-03-10', Willard::sunday('2019-03-15')->format('Y-m-d'));
        $this->assertEquals('2019-03-10', Willard::sunday('2019-03-16')->format('Y-m-d'));
    }
}
