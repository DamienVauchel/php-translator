# ScoobyTranslator documentation

This library permits you to easily create translations for PHP scripts and apps.

## Prerequisites

* PHP >= 7.3

## Install

You can install the package with `git clone` and `composer install` in the directory.

Or you can directly use composer :

```bash
composer require scoobydam/php-translator
```

## Use

### General use

This library is an easy-to-use and light one.

```php
use ScoobyTranslator\Translator\Translator;

$translator = new Translator(__DIR__ . '/translations', 'fr');
$translator->translate('key_to_translate');
```

This example will search for a `fr.php` file in the dir you passed the path in the first parameter.  
This file might be like following

```php
<?php
// __DIR__/translations/fr.php

$translations = [
    'general' => [
        'key' => 'value',
    ],
];
```

It needs to define the `$translations` variable and at least the `general` context key.

### Contexts

This library permits you to use contexts as following

```php
<?php
// translations/fr.php

$translations = [
    'general' => [
        'key' => 'value',
    ],
    'context1' => [
        'key' => 'value from context 1',
        'other_key' => 'An other value',
    ],
    'context2' => [
        'key' => 'value from context 2',
        'other_key' => 'An other value, that\'s smart!',
    ],
];
```

Then, use it like this

```php
use ScoobyTranslator\Translator\Translator;

$translator = new Translator(__DIR__ . '/translations', 'fr');
$translator->translate('key'); // Will return 'value' - By default, 'general' context is used
$translator->translate('key', ['context' => 'context1']); // Will return 'value from context 1'
```

### Variables passed in strings

Using `sprintf()` PHP function, ScoobyTranslator's `translate()` function can pass variables in your returned string like this

```php
<?php
// translations/fr.php

$translations = [
    'general' => [
        'key' => 'Let\'s add a %s',
    ],
    'context1' => [
        'key' => 'I %s it! And I can add as much %s I need to. %s',
    ],
];
```

```php
use ScoobyTranslator\Translator\Translator;

$translator = new Translator(__DIR__ . '/translations', 'fr');
$translator->translate('key', [], 'variable'); // Will return 'Let's add a variable'
$translator->translate('key', ['context' => 'context1'], 'love', 'variables', 'Amazing!'); // Will return 'I love it! And I can add as much variables I need to. Amazing!'
```

For more information, please refer to [php sprintf function doc](https://www.php.net/manual/en/function.sprintf.php).
