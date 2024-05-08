<?php

namespace App\Exceptions;

use Exception;

class AuthWithCodeException extends ApiException
{
    protected $message;
    protected $code = 601;
    protected $httpStatusCode;

    public function __construct(string $message = 'Invalid code', int $code = 401)
    {
        parent::__construct($message, $code);
        $this->message = $message;
        $this->httpStatusCode = $code;
    }


    public function getStatus(): int
    {
        return $this->code;
    }

    public function getStatusMessage(): string
    {
        return $this->message;
    }
}
