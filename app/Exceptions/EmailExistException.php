<?php

namespace App\Exceptions;

use Exception;

class EmailExistException extends Exception
{
    //

    protected $message = 'Email já cadastrado';
    protected $code = 400;
}
