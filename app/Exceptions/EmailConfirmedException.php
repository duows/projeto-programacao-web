<?php

namespace App\Exceptions;

use Exception;

class EmailConfirmedException extends Exception
{
    protected $message = 'Email já confirmado';
    protected $code = 400;
}
