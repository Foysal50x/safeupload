<?php
/**
 * 
 */
class FileSizeTest extends PHPUnit\Framework\TestCase
{
    protected $fileSize;

    public function __construct(? string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        
        $this->fileSize = new \Safe\Validator\FileSize();

    }
    public function testMaxSize()
    {
        $this->fileSize->setMaxSize('4MB');

        $this->assertEquals($this->fileSize->getMaxSize(), 1024*1024*4);
        
        
    }
    
    public function testMinSize()
    {
        $this->fileSize->setMinSize('1kb');
        $this->assertEquals($this->fileSize->getMinSize(),1024);
    }
}
