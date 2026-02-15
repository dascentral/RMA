<?php

use Carbon\Carbon;
use Dascentral\Rma\Willard;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class AgeTest extends TestCase
{
    #[Test]
    public function it_accurately_calculates_age_in_years()
    {
        $expected = 40;
        $date = Carbon::create(date('Y') - $expected, date('n'), date('j'));

        $actual = Willard::age($date);
        $this->assertEquals($expected, $actual);
    }
}
