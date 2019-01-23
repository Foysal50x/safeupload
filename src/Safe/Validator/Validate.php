<?php
namespace Safe\Validator;

class Validate
{
    /**
     * @var $tempPath
     */
    protected $tempPath;

    /**
     * @var $fileName
     */
    protected $fileName;
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

        //$this->fileType = new FileType();
    }

    /**
     * @return string
     */
    public function getTempPath()
    {
        return $this->tempPath;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param FileSize $fileSize
     */
    public function setFileSize(FileSize $fileSize) : void
    {
        $this->fileSize = $fileSize;
    }

    /**
     * @param MimeType $mimeType
     */
    public function setMimeType(MimeType $mimeType) : void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @param $file
     * @return bool
     */
    public function upload($file)
    {
        if ($file['error'] != 0) {
            $this->setErrorMessage($file);
            return false;
        }
        if (!$this->mimeType->validate($file)) {
            $this->errorMessage = array_merge($this->errorMessage, $this->mimeType->getErrorMessage());
            return false;
        }
        if (!$this->fileSize->validate($file)) {
            $this->errorMessage = array_merge($this->errorMessage, $this->fileSize->getErroMessage());
            return false;
        }
        $this->tempPath = $file['tmp_name'];
        $this->fileName = $file['name'];
        return true;
    }

    /**
     * @param $file
     * @return mixed
     */
    protected function setErrorMessage($file)
    {
        switch ($file['error']) {
            case 1:
            case 2:
                $this->errorMessage[] = $file['name'] . ' is to big (max: ' .
                    $this->fileSize::convertFromBytes($this->fileSize->getMaxSize()) . ').';
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

    /**
     * @return array
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

}