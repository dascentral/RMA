<?php

use Carbon\Carbon;
use Dascentral\Rma\Willard;
use PHPUnit\Framework\TestCase;

class AgeTest extends TestCase
{
    /** @test */
    public function it_accurately_calculates_age_in_years()
    {
        $expected = 40;
        $date = Carbon::create(Date('Y') - $expected, Date('n'), Date('j'));

        $actual = Willard::age($date);
        $this->assertEquals($expected, $actual);
    }
}
