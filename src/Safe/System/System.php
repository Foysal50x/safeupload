<?php
namespace Safe\System;

class System implements ISystem
{

    /**
     * @param string $path
     * @return bool
     */
    public function isFile($path){
        return is_file($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function isDir($path){
        return is_dir($path)?true : false;
    }

    /**
     * @param $path
     * @return bool
     */
    public function isWritable($path)
    {
        // TODO: Implement isWritable() method.
        return is_writable($path)?true : false;
    }

    /**
     * @param $path
     * @return bool
     */
    public function fileExists($path){
        return file_exists($path)? true : false;
    }

    /**
     * @param $source
     * @param $dest
     * @return bool
     */
    public function moveFile($source, $dest){
        return @copy($source, $dest) && @unlink($source);
    }

    /**
     * @param
     * @return bool
     */
    public function clearStateCache($path){
        return clearstatcache($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function unlink($path){
        return @unlink($path);
    }

}