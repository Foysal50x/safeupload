<?php

/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/15/18
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ Upload.php
 */

namespace Safe;

use Safe\Resolver\Path;
use Safe\System\System;
use Safe\Validator\Validate;

class Upload
{
    /**
     * @var $ok
     */
    public $ok = false;
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
            $dest = $this->pathResolve->getDestination() . $validate->getFileName();
            if ($system->moveFile($validate->getTempPath(), $dest)) {
                $this->filePath = $dest;
                $this->ok = true;
            } else {
                $this->error[] = "Error moving file";
            }

        } else {
            $this->error = array_merge($this->error, $validate->getErrorMessage());
        }
    }
}

