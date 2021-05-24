<?php

namespace App\Exceptions;

use Exception;

class Modelexception extends Exception {

    protected $message = "";
    private $model = null;
    protected $responseCode = null;
    
    public function __construct($message, $model = null, $responseCode = null)
    {
        $this->message = $message;
        $this->model = $model;
        $this->responseCode = $responseCode;
    }

    public function getModel(){
        return $this->model;
    }


    public function getResponseCode(){
        return $this->responseCode;
    }

}