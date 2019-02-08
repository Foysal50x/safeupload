<?php
namespace Safe\Validator;

use Safe\System\Utilities;

class FileSize
{
    /**
     * @var integer
     */
    protected $serverMax;

    /**
     * @var int
     */
    protected $minSize = 1024;

    /**
     * @var float|int
     */
    protected $maxSize = 1024 * 1024 * 10;

    protected $utility;
    /**
     * @var array
     */
    protected $erroMessage = array();

    public function __construct($config = null)
    {
        $this->utility = new Utilities();
        $this->serverMax = $this->utility::convertToBytes(ini_get('upload_max_filesize'));
        if ($config != null) {
            if (array_key_exists('maxSize', $config)) {

                $this->maxSize = (is_numeric($config['maxSize']) && $config['maxSize'] > 0) ? $this->utility::convertToBytes($config['maxSize']) : $this->maxSize;
            }
            if (array_key_exists('minSize', $config)) {
                $this->minSize = (is_numeric($config['minSize']) && $config['minSize'] > 0) ? $this->utility::convertToBytes($config['minSize']) : $this->minSize;;
            }
        }
    }

    /**
     * @return float|int
     */
    public function getMinSize(): int
    {
        return $this->minSize;
    }

    public function setMinSize($minSize): void
    {
        $this->minSize = $this->utility::convertToBytes($minSize);
    }

    /**
     * @return float|int
     */
    public function getMaxSize(): int
    {
        return $this->maxSize;
    }

    /**
     * @param integer $maxSize
     * @return void
     */
    public function setMaxSize($maxSize): void
    {
        $this->maxSize = $this->utility::convertToBytes($maxSize);
    }
    /**
     * @return array
     */
    public function getErroMessage(): array
    {
        return $this->erroMessage;
    }
    /**
     * @param $file
     * @return bool
     */
    public function validate($file): bool
    {

        if ($file['size'] == 0) {
            $this->erroMessage[] = $file['name'] . 'is empty';
            return false;
        } elseif ($file['size'] < $this->minSize) {
            $this->erroMessage[] = $file['name'] . 'size too lower then' . $this->minSize;
            return false;
        } elseif ($file['size'] > $this->maxSize) {
            $this->erroMessage[] = $file['name'] . 'size too getter then' . $this->maxSize;
            return false;
        } elseif ($file['size'] > $this->serverMax) {
            $this->erroMessage[] = "Maximum size con't exceed server limit for individual files: " .
                $this->utility::convertFromBytes($this->serverMax);
            return false;
        } else {
            return true;
        }
    }
}