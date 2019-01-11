<?php
namespace Safe\Validator;

class FileSize
{

    /**
     * @var int
     */
    protected $minSize = 1024;

    /**
     * @var float|int
     */
    protected $maxSize = 1024*1024*10;

    public function __construct($config = null)
    {
        if ($config != null){
            if (array_key_exists('maxSize',$config)){
                $this->maxSize = (is_numeric($config['maxSize']) && $config['maxSize'] > 0)?$config['maxSize']:$this->maxSize;
            }
            if (array_key_exists('minSize',$config)){
                $this->minSize = (is_numeric($config['minSize']) && $config['minSize'] > 0)?$config['minSize']:$this->minSize;;
            }
        }
    }

    /**
     * @return float|int
     */
    public function getMinSize()
    {
        return $this->minSize;
    }

    /**
     * @return float|int
     */
    public function getMaxSize()
    {
        return $this->maxSize;
    }
}