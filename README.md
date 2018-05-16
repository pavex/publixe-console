# Sipmple console for PHP with stdout and fileout

Installation
---

```cmd
composer install publixe/console
```

And use Publixe\Console.
Here is a simple exmaple how to use it.

```php
use Publixe\Console;

// Write messege on CLI only
Console::cli('CLI only message.');
Console::log('Stdout not enabled yet.');

// Enable Stdout writter
Console::enable();

// Enable File writter
Console::setFilename('fileout.txt');

// ...and write message
Console::log('Some message.');
Console::warning('Some warning.');

```
