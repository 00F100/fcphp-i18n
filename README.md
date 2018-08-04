# FcPhp i18n

[![Build Status](https://travis-ci.org/00F100/fcphp-i18n.svg?branch=master)](https://travis-ci.org/00F100/fcphp-i18n) [![codecov](https://codecov.io/gh/00F100/fcphp-i18n/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/fcphp-i18n) [![Total Downloads](https://poser.pugx.org/00F100/fcphp-i18n/downloads)](https://packagist.org/packages/00F100/fcphp-i18n)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-i18n
```

or add in composer.json
```json
{
    "require": {
        "00f100/fcphp-i18n": "*"
    }
}
```

## How to use

```php
<?php

$default = 'pt-br';
$translate = [
    'pt-br' => [
        'My name is %s' => 'Meu nome é %s',
    ],
    'en' => [
        'My name is %s' => 'My name is %s',
    ],
    'es' => [
        'My name is %s' => 'Mi nombre és %s',
    ],
];
__i18n_configure($default, $translate);
$name = 'João';
$text = 'My name is %s';

// Print: Meu nome é João
echo __($text, $name);

// Print: Meu nome é João
echo _i18n_translate($text, $name);

```