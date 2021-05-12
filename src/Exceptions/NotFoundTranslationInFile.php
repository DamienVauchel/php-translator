<?php

namespace ScoobyTranslator\Exceptions;

use Exception;
use Throwable;

class NotFoundTranslationInFile extends Exception
{
    public function __construct(string $language, Throwable $previous = null)
    {
        parent::__construct('TRANSLATOR WARNING - No translation found in ' . $language . '.php', 404, $previous);
    }
}
