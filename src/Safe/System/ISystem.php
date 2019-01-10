<?php
namespace Safe\System;

interface ISystem
{
    /**
     * Is it a file?
     * @param string $path
     * @return bool
     */
    public function isFile($path);

    /**
     * Is it a directory
     * @param string $path
     * @return bool
     */
    public function isDir($path);

    /*
     * Is it writable directory
     * @param string $path
     * @return bool
     */
    public function isWritable($path);

    /**
     * Is it a previously uploaded file
     * @param string $path
     * @return bool
     */
    public function fileExists($path);

    /**
     * Move file
     * @param string $source
     * @param string $dest
     * @return bool
     */
    public function moveFile($source, $dest);

    /**
     * Clear filesize cache on disk
     * @param string $path
     * @return bool
     */
    public function clearStateCache($path);

    /**
     * Delete path
     * @param  string $path
     * @return boolean
     */
    public function unlink($path);
}