<?php
namespace Safe\Validator;

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
    public function __construct()
    {
        $this->permittedMimeTypes = array_merge($this->defaultImageMimeTypes, $this->defaultAudioMimeTypes);
    }

    /**
     * @return array
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param $file
     * @return bool
     */
    public function validate($file)
    {

        if (in_array($file["type"], $this->permittedMimeTypes)) {
            return true;
        } else {
            $this->errorMessage[] = $file['name'] . 'is invalid type of file.';
            return false;
        }
    }


}