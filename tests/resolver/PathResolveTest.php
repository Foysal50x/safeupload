<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/11/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ PathResolveTest.php
 */
class PathResolveTest extends PHPUnit\Framework\TestCase
{

    public function testAssertUploadDirectoryEquals(){
        $dir = __DIR__."/unit/";
        $path = new \Safe\Resolver\Path($dir);
        try{
            $path->validate();
        }catch (Exception $e){
            $this->assertNotEmpty($e);
        }
        $this->assertEquals($path->getDestination(),"/Users/faisal/Playground/PHP/Safe Upload/tests/resolver/unit/");
    }
}