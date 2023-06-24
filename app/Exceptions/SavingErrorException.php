<?php

namespace App\Exceptions;

use Exception;

class SavingErrorException extends Exception
{
    public function getStatus(): int
    {
        return 601;
    }

    public function getStatusMessage(): string
    {
        return 'link saving error';
    }

}
