<?php

use Dascentral\Rma\Willard;
use PHPUnit\Framework\TestCase;

class AgeFromDateTest extends TestCase
{
    /** @test */
    public function it_accurately_calculates_age_in_years()
    {
        $expected = 40;
        $actual = Willard::ageFromDate(Date('Y') - $expected, Date('n'), Date('j'));
        $this->assertEquals($expected, $actual);
    }
}
