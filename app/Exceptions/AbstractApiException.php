<?php

namespace App\Exceptions;

use Exception;

abstract class AbstractApiException extends Exception
{
    protected int $errorCode;
    protected string $errorMessage;
    protected string $errorMessageCode;

    public function __construct()
    {
        parent::__construct($this->errorMessage, $this->errorCode);
    }

    public function render()
    {
        return [
            'code' => $this->errorMessageCode,
            'message' => $this->errorMessage,
        ];
    }
}
