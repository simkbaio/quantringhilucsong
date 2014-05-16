<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/16/2014
 * Time: 3:40 PM
 */

namespace Acme\Exceptions;


class PermissionException extends \Exception {

    /**
     * @param string $message
     */
    function __construct($message)
    {
        parent::__construct($message);
    }

    /**
     * Get form validation errors
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
} 