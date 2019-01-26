<?php

/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/15/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ Upload.php
 */

class UploadTest extends PHPUnit\Framework\TestCase
{

    private $upload;

    public function __construct(? string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $_FILES = array(
            'file' => array(
                'name' => 'images.jpeg',
                'tmp_name' => __DIR__ . '/files/images.jpeg',
                'type' => 'image/jpeg',
                'size' => 6818,
                'error' => 0
            )
        );
        $this->upload = new \Safe\Upload($_FILES);

    }

    public function testUpload()
    {
        $path = new \Safe\Resolver\Path(__DIR__ . '/files/upload/');
        $validator = new \Safe\Validator\Validate();
        $mimeType = new \Safe\Validator\MimeType();
        $validator->setMimeType($mimeType);
        $this->upload->setValidator($validator);
        $this->upload->setUploadPath($path);
        $this->assertIsArray($this->upload->_files);
        $this->upload->prepare();
        $this->assertEmpty($this->upload->error);
        $this->assertTrue($this->upload->ok);
    }




}