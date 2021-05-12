<?php

namespace ScoobyTranslator\Translator;

use ScoobyTranslator\Exceptions\NotFoundTranslation;
use ScoobyTranslator\Exceptions\NotFoundTranslationFile;
use ScoobyTranslator\Exceptions\NotFoundTranslationInFile;

class Translator
{
    /** @var string[][] */
    private $translations;

    /**
     * @throws NotFoundTranslationFile
     * @throws NotFoundTranslationInFile
     */
    public function __construct(string $translationsDirPath, string $language = 'en')
    {
        $file = $translationsDirPath . '/' . $language . '.php';

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
     * @throws NotFoundTranslation
     */
    public function translate(string $key, array $params = [], ...$variables): string
    {
        if (!isset($params['context'])) {
            $params['context'] = 'general';
        }

        if (!isset($this->translations[$params['context']][$key])) {
            throw new NotFoundTranslation($key, $params['context']);
        }

        return sprintf($this->translations[$params['context']][$key], ...array_values($variables));
    }
}
