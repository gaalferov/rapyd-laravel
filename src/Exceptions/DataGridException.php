<?php namespace Iginikolaev\Rapyd\Exceptions;

use Exception;

class DataGridException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
