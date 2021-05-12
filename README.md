# Simple and light PHP translator

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

## Full documentation

To know all what you can do, you can find full documentation [here](./doc/doc.md).

## Contributions

You can send PRs if you want to :)

Just, please, follow these [conventions](./doc/conventions.md).
