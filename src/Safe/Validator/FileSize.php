<?php
namespace Safe\Validator;

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
        $this->serverMax = self::convertToBytes(ini_get('upload_max_filesize'));
        if ($config != null) {
            if (array_key_exists('maxSize', $config)) {

                $this->maxSize = (is_numeric($config['maxSize']) && $config['maxSize'] > 0) ? $config['maxSize'] : $this->maxSize;
            }
            if (array_key_exists('minSize', $config)) {
                $this->minSize = (is_numeric($config['minSize']) && $config['minSize'] > 0) ? $config['minSize'] : $this->minSize;;
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
     * @return array
     */
    public function getErroMessage()
    {
        return $this->erroMessage;
    }
    /**
     * @param $file
     * @return bool
     */
    public function validate($file)
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
                self::convertFromBytes($this->serverMax);
            return false;
        } else {
            return true;
        }
    }

    public static function convertToBytes($val)
    {
        $val = trim($val);
        $last = strtolower($val[strlen($val - 1)]);
        if (in_array($last, array('g', 'm', 'k'))) {
            switch ($last) {
                case "g":
                    $val *= 1024;
                case "m":
                    $val *= 1024;
                case "k":
                    $val *= 1024;

            }
        }

        return $val;
    }

    public static function convertFromBytes($bytes)
    {
        $bytes /= 1024;
        if ($bytes > 1024) {
            return number_format($bytes / 1024, 1) . ' MB';
        } else {
            return number_format($bytes, 1) . ' KB';
        }
    }
}