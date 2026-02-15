<?php

use Dascentral\Rma\Willard;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class AgeFromDateTest extends TestCase
{
    #[Test]
    public function it_accurately_calculates_age_in_years()
    {
        $expected = 40;
        $actual = Willard::ageFromDate(Date('Y') - $expected, Date('n'), Date('j'));
        $this->assertEquals($expected, $actual);
    }
}
