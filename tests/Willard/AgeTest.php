<?php

use Dascentral\Rma\Willard;
use PHPUnit\Framework\TestCase;

class AgeTest extends TestCase
{
    /** @test */
    public function it_accurately_calculates_age_in_years()
    {
        $expected = 40;
        $actual = Willard::age(Date('n'), Date('j'), Date('Y') - $expected);
        $this->assertEquals($expected, $actual);
    }
}
