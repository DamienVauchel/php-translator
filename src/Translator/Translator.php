<?php

namespace ScoobyTranslator\Translator;

use Exception;
use ScoobyTranslator\Exceptions\NotFoundTranslationFile;
use ScoobyTranslator\Exceptions\NotFoundTranslationInFile;

class Translator
{
    /** @var string[] */
    private $translations;

    /** @throws Exception */
    public function __construct(string $language = 'en')
    {
        $file = getcwd() . '/translations/' . $language . '.php';

        if (!is_file($file)) {
            throw new NotFoundTranslationFile($language);
        }

        require_once $file;

        if (!isset($translations)) {
            throw new NotFoundTranslationInFile($language);
        }

        $this->translations = $translations;
    }

    /**
     * @param string[] $params
     * @param bool|float|int|string|null $variables
     *
     * @throws Exception
     */
    public function translate(string $key, array $params = [], ...$variables): string
    {
        if (!isset($params['context'])) {
            $params['context'] = 'general';
        }

        if (!isset($this->translations[$params['context']][$key])) {
            return 'TRADUCTOR WARNING - Missing traduction key ' . $key . ' in context ' . $params['context'];
        }

        return sprintf($this->translations[$params['context']][$key], ...array_values($variables));
    }
}
