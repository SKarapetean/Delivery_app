<?php

namespace App\Exceptions;

use Exception;

abstract class ApiException extends Exception
{
    protected $httpStatusCode = 500;

    public function __construct($message = null, $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }
    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }
}
