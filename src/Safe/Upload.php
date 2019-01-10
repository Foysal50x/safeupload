<?php
namespace Safe;

use Safe\System\System;
use Safe\Validator\Validate;

class Upload
{
    protected $_files;
    public $error = array();
    public function __construct($_files)
    {
        $this->_files = $_files;
    }

    public function done(){

        $system = new System();
        $validate = new Validate();
        $uploaded = current($this->_files);
        if ($validate->upload($uploaded)){

            try{


            }catch (\Exception $e){

            }

        }
    }
}

