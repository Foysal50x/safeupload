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

    protected $suffix = '.upload';

    protected $maliciousFile = array(
        'py',
        'sh',
        'bin',
        'cgi',
        'php',
        'js',
        'exe'
    );

}