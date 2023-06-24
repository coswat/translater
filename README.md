## Translater

- coswat translater is php package to translate langauges easily without having any Api Key.
- it uses a free open source api url to translate langauges

## Installation

- Install via Composer
```
composer require coswat/translater
```

## Usage

Example of translating english to spanish
```php
<?php

require_once 'vendor/autoload.php';

use Coswat\Translater\Translate;

$t = new Translate();

$translated = $t->string('Hello')->convert('en','es');
echo $translated; // show Hola.

```

## License

The translater package is open-sourced software licensed under the [MIT license](LICENSE.md).
