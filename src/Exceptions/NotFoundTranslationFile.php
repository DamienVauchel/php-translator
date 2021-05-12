<?php

namespace ScoobyTranslator\Exceptions;

use Exception;
use Throwable;

class NotFoundTranslationFile extends Exception
{
    public function __construct(string $language, Throwable $previous = null)
    {
        parent::__construct('TRADUCTOR ERROR - No translation file found for ' . $language, 404, $previous);
    }
}
