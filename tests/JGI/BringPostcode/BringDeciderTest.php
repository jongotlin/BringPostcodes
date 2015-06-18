<?php

namespace JGI\SwedishDates\Tests\Date;

use JGI\BringPostcode\BringDecider;

class BringDeciderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider bringPostcodesProvider
     */
    public function shouldHandlePostcode($postcode)
    {
        $this->assertTrue(BringDecider::isBringPostcode($postcode));
    }

    /**
     * @test
     * @dataProvider nonBringPostcodesProvider
     */
    public function shouldNotHandlePostcode($postcode)
    {
        $this->assertFalse(BringDecider::isBringPostcode($postcode));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Postcode 123456 is invalid
     */
    public function shouldThrowExceptionIfInvalidPostcode()
    {
        BringDecider::isBringPostcode('123456');
    }

    /**
     * @return array
     */
    public function bringPostcodesProvider()
    {
        return [
            ['100 00'],
            ['199 99'],
            ['719 30'],
        ];
    }

    /**
     * @return array
     */
    public function nonBringPostcodesProvider()
    {
        return [
            ['905 95'],
            ['511 00'],
        ];
    }
}
