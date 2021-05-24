<?php

namespace App\Exceptions;

use Exception;

class RouteException extends Exception {

	protected $message      = '';
	protected $routeTo      = '';
	protected $responseCode = null;
	protected $statusCode   = null;

	public function __construct($message, $routeTo = '/', $responseCode = null, $statusCode = null)
	{
		$this->message      = $message;
		$this->routeTo      = $routeTo;
		$this->responseCode = $responseCode;
		$this->statusCode   = $statusCode;
	}

	public function getResponseCode()
	{
		return $this->responseCode;
	}

	public function getRouteTo()
	{
		return $this->routeTo;
	}

	public function getStatusCode()
	{
		return $this->statusCode;
	}

}
