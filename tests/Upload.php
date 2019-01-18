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
        $_FILES = array(
            'file'    =>  array(
                'name'      =>  'images.jpeg',
                'tmp_name'  =>  __DIR__ . '/files/images.jpeg',
                'type'      =>  'image/jpeg',
                'size'      =>  6818,
                'error'     =>  0
            )
        );
        $this->upload = new \Safe\Upload($_FILES);

    }

    public function testSetUpload(){
        $pathResolve = new \Safe\Resolver\Path('uploads/');

        $this->assertIsArray($this->upload->_files);


    }




}