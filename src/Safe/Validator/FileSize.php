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

    /**
     * @var array
     */
    protected $erroMessage = array();

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


    /**
     * @param $file
     * @return bool
     */
    public function checkSize($file){

        if($file['size'] == 0){
            $this->erroMessage[] = $file['name'] . 'is empty';
            return false;
        }elseif ($file['size']< $this->minSize){
            $this->erroMessage[] = $file['name'] . 'size too lower then'. $this->minSize;
            return false;
        }elseif($file['size']> $this->maxSize){
            $this->erroMessage[] = $file['name'] . 'size too getter then'. $this->maxSize;
            return false;
        }else{
            return true;
        }
    }
}