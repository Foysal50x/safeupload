<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/11/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ SystemTest.php
 */

class SystemTest extends PHPUnit\Framework\TestCase
{
    private $system;
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->system = new Safe\System\System();


    }

    public function testIsDirTrue(){
        $dir = __DIR__;

        $this->assertTrue($this->system->isDir($dir));
    }

    public function testIsDirFalse(){
        $dir = __DIR__."/demo/";

        $this->assertFalse($this->system->isDir($dir));
    }


    public function testIsFileTrue(){
        $file = __DIR__."/SystemTest.php";

        $this->assertTrue($this->system->isFile($file));
    }

    public function testIsFileFalse(){
        $file = __DIR__."/NoFile.php";

        $this->assertFalse($this->system->isFile($file));
    }

    public function testIsWritableTrue(){
        $file = __DIR__."/SystemTest.php";

        $this->assertTrue($this->system->isWritable($file));
    }

    public function testIsWritableFalse(){
        $file = __DIR__."/NoFile.php";

        $this->assertFalse($this->system->isWritable($file));
    }

    public function testFileExistsTrue(){
        $file = __DIR__."/SystemTest.php";

        $this->assertTrue($this->system->fileExists($file));
    }

    public function testFileExistsFalse(){
        $file = __DIR__."/NoFile.php";

        $this->assertFalse($this->system->fileExists($file));
    }
    /*public function testMoveFileTrue(){
        $source = __DIR__."/move.php";
        $dest = __DIR__ . "/move/move.php";

        $this->assertTrue($this->system->moveFile($source,$dest));
    }*/
}