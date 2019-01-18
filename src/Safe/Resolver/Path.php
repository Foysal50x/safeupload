<?php
namespace Safe\Resolver;
use Safe\System\System;

class Path implements IPath
{

    /**
     * File upload folder
     * @var $destination
     */
    protected $destination;

    /**
     * @var array
     */
    protected $errorMessage = array();

    /**
     * Path constructor.
     * @param $uploadFolder
     */
    public function __construct($uploadFolder)
    {
        $this->destination = $uploadFolder;

        try{
            $this->validate();
        }catch (\Exception $exception){
            $this->errorMessage[] = $exception;
        }
    }

    /**
     * @throws \Exception
     * @return mixed
     */
    public function validate(){

        $system = new System();
        if ($this->destination[strlen($this->destination) -1] != '/') $this->destination .= '/';
        if (!$system->isDir($this->destination) || !$system->isWritable($this->destination)){
            throw new \Exception("$this->destination must be a valid, writable folder");
        }
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return array
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}