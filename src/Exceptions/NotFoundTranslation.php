<?php

namespace ScoobyTranslator\Exceptions;

use Exception;
use Throwable;

class NotFoundTranslation extends Exception
{
    public function __construct(string $key, string $context, Throwable $previous = null)
    {
        parent::__construct('TRANSLATOR ERROR - Missing traduction key ' . $key . ' in context ' . $context, 404, $previous);
    }
}
