<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 2019-02-25
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ ValidateTest.php
 */

class ValidateTest extends \PHPUnit\Framework\TestCase
{
    private $validate;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->validate = new Safe\Validator\Validate();
        $_FILES = array(
            'upload' => array(
                'name' => 'images.jpeg',
                'tmp_name' => __DIR__ . '/../files/images.jpeg',
                'type' => 'image/jpeg',
                'size' => 6818,
                'error' => 0
            )
        );
    }

    public function testValidateUpload()
    {
        $this->assertTrue($this->validate->upload(current($_FILES)), json_encode($this->validate->errorMessage));
    }
}