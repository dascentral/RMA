<?php

use Dascentral\Rma\Juliet;
use PHPUnit\Framework\TestCase;

class JulietTest extends TestCase
{
    /** @test */
    public function it_capitalizes_the_first_letter_of_names_provided_in_all_lowercase()
    {
        $this->assertEquals('Jane Doe', Juliet::format('jane doe'));
    }
}
