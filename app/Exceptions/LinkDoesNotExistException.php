<?php

namespace App\Exceptions;

use Exception;

class LinkDoesNotExistException extends Exception
{
    public function getStatus(): int
    {
        return 602;
    }

    public function getStatusMessage(): string
    {
        return 'link does not exist';
    }

}
