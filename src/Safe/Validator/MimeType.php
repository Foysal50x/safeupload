<?php
namespace Safe\Validator;

use phpDocumentor\Reflection\Types\Void_;


class MimeType
{
    protected $suffix = '.safeupload';

    protected $maliciousType = array(
        'py',
        'sh',
        'bin',
        'cgi',
        'php',
        'js',
        'exe'
    );

    protected $permittedMimeTypes;

    protected $errorMessage = array();

    protected $defaultMimeTypes = array();

    protected $defaultImageMimeTypes = array(
        'image/jpeg',
        'image/pjpeg',
        'image/gif',
        'image/png',
        'image/webp',
        'image/svg+xml'
    );

    protected $defaultAudioMimeTypes = array(
        'audio/midi',
        'audio/mpeg',
        'audio/webm',
        'audio/ogg',
        'audio/wav',
        'audio/mp3'
    );

    /**
     * MimeType constructor.
     */
    public function __construct(array $mimeType = null)
    {
        if ($mimeType !== null) {
            $this->permittedMimeTypes = $mimeType;
        } else {
            $this->permittedMimeTypes = array_merge($this->defaultImageMimeTypes, $this->defaultAudioMimeTypes);
        }
    }

    /**
     * @param string $suffix
     * @return mixed
     */
    public function setSuffix(string $suffix) : void
    {
        if (!empty($suffix)) $this->suffix = $suffix;
    }

    /**
     * @return string
     */
    public function getSuffix() : string
    {
        return $this->suffix;
    }

    /**
     * @return array
     */
    public function getErrorMessage() : array
    {
        return $this->errorMessage;
    }

    /**
     * @param $file
     * @return bool
     */
    public function validate($file) : bool
    {

        if (in_array($file["type"], $this->permittedMimeTypes)) {
            return true;
        } else {
            $this->errorMessage[] = $file['name'] . 'is invalid type of file.';
            return false;
        }
    }


}