<?php

namespace App\Exceptions;

use Exception;

class Permissionexception extends Exception {

    protected $message = "";
    protected $responseCode = null;
    
    public function __construct($message, $responseCode = null)
    {
        $this->message = $message;
        $this->responseCode = $responseCode;
    }

    public function getResponseCode(){
        return $this->responseCode;
    }

}