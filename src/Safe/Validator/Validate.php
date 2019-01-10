<?php
namespace Safe\Validator;

class Validate
{
    public $errorMessage = array();

    /**
     * @param $file
     * @return bool
     */
    public function upload($file){
        if ($file['error'] != 0){
            $this->getErrorMessage($file);
            return false;
        }
        return true;
    }

    /**
     * @param $file
     * @return mixed
     */
    protected function getErrorMessage($file){
        switch ($file['error']){
            case 1:
            case 2:
                $this->errorMessage[] = $file['name'] . ' is to big.';
                break;
            case 3:
                $this->errorMessage[] = $file['name'] . 'was only partially uploaded.';
                break;
            case 4:
                $this->errorMessage[] = 'No file submitted.';
                break;
            default:
                $this->errorMessage[] = 'Sorry there was a problem uploading' . $file['name'];
                break;
        }
    }

}