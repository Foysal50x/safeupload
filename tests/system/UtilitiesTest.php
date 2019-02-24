<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 2019-02-24
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ UtilitiesTest.php
 */

class UtilitiesTest extends PHPUnit\Framework\TestCase
{
    private $utilities;
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->utilities = new Safe\System\Utilities();
    }

    public function testConvertToBytes()
    {
        $size = '5MB';
        $bytes = 1024*1024*5;
        $this->assertEquals($bytes, $this->utilities::convertToBytes($size));
    }

    public function testConvetFromBytes()
    {
        $bytes = 1024*2;
        $size = '2.0 KB';

        $this->assertEquals($size, $this->utilities::convertFromBytes($bytes));
    }
}