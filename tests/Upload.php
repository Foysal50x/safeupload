<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/15/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ Upload.php
 */

class Upload extends PHPUnit\Framework\TestCase
{

    private $upload;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->upload = new \Safe\Upload();
    }

    public function testSetUploadPath(){

    }

}