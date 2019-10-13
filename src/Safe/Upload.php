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
    protected $ok = false;
    /**
     * @var $_files
     */
    public $_files;

    /**
     * @var string
     */
    protected $filePath;

	/**
	 * @var array
	 */
    protected $filePaths = [];

    /**
     * @var Validate
     */
    protected $validator;

    /**
     * @var Path
     */
    protected $pathResolve;

    /**
     * @var array
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
    public function getUploadDir()
    {
        return $this->pathResolve->getDestination();
    }

    /**
     * @return string
     */
    public function getFilePath():string
    {
        return $this->filePath;
    }

	/**
	 * @return array
	 */
    public function getFilePaths():array {
    	return $this->filePaths;
	}

    /**
     * @return mixed
     */
    public function prepare()
    {

        $validate = $this->validator;
        $uploaded_file = count($this->_files);
        if ($uploaded_file === 1) {
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
        }elseif ($uploaded_file>1){
        	foreach ($this->_files as $file){
				if ($validate->upload($file)) {

					$system = new System();
					$dest = $this->pathResolve->getDestination() . $validate->getFileName();
					if ($system->moveFile($validate->getTempPath(), $dest)) {
						$this->filePaths[] = $dest;
					} else {
						$this->error[] = "Error moving file";
					}

				} else {
					$this->error = array_merge($this->error, $validate->getErrorMessage());
				}
			}
			$this->ok = true;
		}
    }

	/**
	 * @return bool
	 */
    public function isOk():bool {
    	return $this->ok;
	}
}

