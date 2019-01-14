<?php
namespace Safe;

use Safe\System\System;
use Safe\Validator\Validate;

class Upload
{
    protected $_files;

    protected $validator;

    public $error = array();

    protected $maxsize = 51200;

    public function __construct($_files)
    {
        $this->_files = $_files;
        $this->validator = new Validate();;
    }

    /**
     * @param mixed $validator
     */
    public function setValidator(Validate $validator)
    {
        $this->validator = $validator;
    }
    public function prepare(){

        $system = new System();
        $validate = $this->validator;
        $uploaded = current($this->_files);
        if ($validate->upload($uploaded)){

            try{


            }catch (\Exception $e){

            }

        }
    }
}

