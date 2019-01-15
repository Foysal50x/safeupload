<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/15/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ FileType.php
 */

namespace Safe\Validator;


class FileType
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


    /**
     * @return array
     */
    public function getMaliciousType()
    {
        return $this->maliciousType;
    }

    /**
     * @param array $maliciousType
     */
    public function setMaliciousType(array $maliciousType)
    {
        $this->maliciousType = $maliciousType;
    }




}