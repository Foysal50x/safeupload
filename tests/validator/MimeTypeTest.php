<?php
/**
 * 
 */
class MimeTypeTest extends PHPUnit\Framework\TestCase
{
    private $mimeType;

    public function __construct(? string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mimeType = new \Safe\Validator\MimeType();
        $_FILES = array(
            'file' => array(
                'name' => 'images.jpeg',
                'tmp_name' => __DIR__ . '/files/images.jpeg',
                'type' => 'image/jpeg',
                'size' => 6818,
                'error' => 0
            )
        );

    }

    public function testSuffix(){
        $this->mimeType->setSuffix('.upload');

        $this->assertEquals($this->mimeType->getSuffix(),'.upload');
    }
}
