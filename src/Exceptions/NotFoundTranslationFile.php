<?php

namespace ScoobyTranslator\Exceptions;

use Exception;
use Throwable;

class NotFoundTranslationFile extends Exception
{
    public function __construct(string $language, Throwable $previous = null)
    {
        parent::__construct('TRANSLATOR ERROR - No translation file found for ' . $language, 404, $previous);
    }
}
