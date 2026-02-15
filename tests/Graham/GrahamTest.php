<?php

use Dascentral\Rma\Graham;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GrahamTest extends TestCase
{
    #[Test]
    public function it_formats_ten_digit_phone_numbers()
    {
        $this->assertEquals('(703) 555-1234', Graham::format('703 555 1234'));
    }

    #[Test]
    public function it_formats_phone_numbers_with_a_plus_one_country_code()
    {
        $this->assertEquals('(703) 555-1234', Graham::format('+1 703 555 1234'));
        $this->assertEquals('+1703 555 1234', Graham::format('+1703 555 1234'));
    }

    #[Test]
    public function it_does_not_modity_phone_numbers_with_more_than_ten_digits()
    {
        $this->assertEquals('+44 20 7780 4786', Graham::format('+44 20 7780 4786'));
    }
}
