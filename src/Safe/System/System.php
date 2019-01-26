<?php

/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/15/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ System.php
 */

namespace Safe\System;

class System implements ISystem
{

    /**
     * @param string $path
     * @return bool
     */
    public function isFile($path)
    {
        return is_file($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function isDir($path)
    {
        return is_dir($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function isWritable($path)
    {
        // TODO: Implement isWritable() method.
        return is_writable($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function fileExists($path)
    {
        return file_exists($path) ? true : false;
    }

    /**
     * @param $source
     * @param $dest
     * @return bool
     */
    public function moveFile($source, $dest)
    {
        return copy($source, $dest) && unlink($source);
    }

    public function renameFile($file)
    {
        $oldName = $file['name'];
    }

    /**
     * @param
     * @return bool
     */
    public function clearStateCache($path)
    {
        return clearstatcache($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function unlink($path)
    {
        return @unlink($path);
    }

}