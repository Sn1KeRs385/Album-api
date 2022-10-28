<?php

namespace App\Exceptions;

use Exception;

abstract class AbstractApiException extends Exception
{
    protected int $errorCode;
    protected string $errorMessage;
    protected string $errorSystemMessage;

    public function __construct()
    {
        parent::__construct($this->errorMessage, $this->errorCode);
    }
}
