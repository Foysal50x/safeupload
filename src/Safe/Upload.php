<?php
namespace Safe;

use Safe\Resolver\Path;
use Safe\System\System;
use Safe\Validator\Validate;

class Upload
{
    /**
     * @var $_files
     */
    public $_files;

    /**
     * @var $filePath
     */
    protected $filePath;

    /**
     * @var $validator
     */
    protected $validator;

    /**
     * @var $uploadPath
     */
    protected $pathResolve;

    /**
     * @var array $error
     */
    public $error = array();

    public function __construct($_files)
    {
        $this->_files = $_files;
        $this->validator = new Validate();
    }

    /**
     * @param mixed $validator
     */
    public function setValidator(Validate $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param mixed $uploadPath
     */
    public function setUploadPath(Path $uploadPath)
    {
        $this->pathResolve = $uploadPath;
    }


    /**
     * @return mixed
     */
    public function getUploadPath()
    {
        return $this->pathResolve->getDestination();
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @return mixed
     */
    public function prepare()
    {

        $validate = $this->validator;
        $uploaded = current($this->_files);
        if ($validate->upload($uploaded)) {

            $system = new System();


        }
    }
}

