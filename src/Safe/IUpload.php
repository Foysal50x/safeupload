<?
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 2/08/18
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ IUpload.php
 */

namespace Safe;

interface IUpload {
    /**
     * @param Path $path
     * @return mixed
     */
    public function setUploadPath(Path $path);

    /**
     * @return string
     */
    public function getUploadDir();

    /**
     * @return string
     */

    public function getFilePath();
    /**
     * @return mixed
     */
    public function prepare();
} 