<?php

namespace App\Exceptions;

class SaveImageException extends ApiException
{

    protected $code = 608;
    public function __construct($message = null, $code = null)
    {
        parent::__construct($message, $code);
        $this->message = $message ?? 'Could not save image';
        $this->httpStatusCode = $code ?? 500;
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
