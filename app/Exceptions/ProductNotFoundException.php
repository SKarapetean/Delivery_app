<?php

namespace App\Exceptions;

class ProductNotFoundException extends ApiException
{

    protected $code = 604;
    public function __construct($message = null, $code = null)
    {
        parent::__construct($message, $code);
        $this->message = $message ?? 'Product not found';
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
