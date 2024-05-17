<?php

namespace App\Exceptions;

class OrderNotFoundException extends ApiException
{

    protected $code = 704;
    public function __construct($message = null, $code = null)
    {
        parent::__construct($message, $code);
        $this->message = $message ?? 'Order not found';
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
