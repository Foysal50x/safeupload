<?php
namespace Safe\Validator;

use Safe\System\Utilities;

class Validate
{
    /**
     * @var MimeType
     */
    protected $mimeType;

    /**
     * @var FileSize
     */
    protected $fileSize;

    /**
     * @var $fileType
     */
    protected $fileType;

    /**
     * @var Utilities
     */
    protected $utilities;

    /**
     * @var array $errorMessage
     */
    public $errorMessage = array();

    /**
     * Validate constructor.
     */
    public function __construct()
    {
        $this->fileSize = new FileSize();

        $this->mimeType = new MimeType();

        $this->utilities = new Utilities();

        $this->fileType = new FileType();
    }

    /**
     * @param FileSize $fileSize
     */
    public function setFileSize(FileSize $fileSize): void
    {
        $this->fileSize = $fileSize;
    }

    /**
     * @param MimeType $mimeType
     */
    public function setMimeType(MimeType $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @param $file
     * @return bool
     */
    public function upload($file){
        if ($file['error'] != 0){
            $this->getErrorMessage($file);
            return false;
        }

        if (!$this->mimeType->validate($file)){
            $this->errorMessage = array_merge($this->errorMessage,$this->mimeType->getErrorMessage());
            return false;
        }
        if (!$this->fileSize->validate($file)){
            $this->errorMessage = array_merge($this->errorMessage,$this->fileSize->getErroMessage());
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
                $this->errorMessage[] = $file['name'] . ' is to big (max: '.
                    $this->utilities::convertFromBytes($this->fileSize->getMaxSize()) .').';
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