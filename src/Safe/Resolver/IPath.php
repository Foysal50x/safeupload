<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 1/10/19
 * #Phone:  @ 01788656451
 * #Email:  @ contact.faisalahmed@gmail.com
 * #Project Safe Upload File @ IPath.php
 */
namespace Safe\Resolver;

interface IPath
{
    /**
     * validate file upload folder
     * @return mixed
     */
    public function validate();

    /**
     * Uploaded file path
     * @return string
     */
    public function getDestination();
}