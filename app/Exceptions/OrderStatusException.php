<?php

namespace App\Exceptions;

class OrderStatusException extends ApiException
{

    protected $code = 804; //check code
    public function __construct($message = null, $code = null)
    {
        parent::__construct($message, $code);
        $this->message = $message ?? 'Order status does not allow to delete it';
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
