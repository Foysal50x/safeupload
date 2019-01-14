<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/14/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ IUtilities.php
 */

interface IUtilities{
    /**
     * Convert number value to bytes value
     * @param $val
     * @return integer
     */
    public static function convertToBytes($val);

    /**
     * convert bytes to GB|MB|KB
     * @param $bytes
     * @return string
     */
    public static function convertFromBytes($bytes);
}