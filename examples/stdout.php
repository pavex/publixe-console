<?php

require_once __DIR__ . '/../src/Console.php';
require_once __DIR__ . '/../src/Console/IWriter.php';
require_once __DIR__ . '/../src/Console/AbstractWriter.php';
require_once __DIR__ . '/../src/Console/Stdout.php';
require_once __DIR__ . '/../vendor/autoload.php';


//
use Publixe\Container;
use Publixe\Console;

// Setup container
Container::set(Publixe\Console\Stdout::class);

Console::addWriter(Publixe\Console\Stdout::class);

// ...and process mesage
Console::log('Some message.');
Console::warning('Some warning.');
