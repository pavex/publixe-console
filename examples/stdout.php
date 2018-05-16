<?php

require_once __DIR__ . '/../src/Console.php';
require_once __DIR__ . '/../src/Console/IWriter.php';
require_once __DIR__ . '/../src/Console/Stdout.php';
require_once __DIR__ . '/../vendor/autoload.php';


//
use Publixe\Console;

// Write messege on CLI only
Console::cli('CLI only message.');
Console::log('Stdout not enabled yet.');

// Enable Stdout writter
Console::enable();

// ...and write message
Console::log('Some message.');
Console::warning('Some warning.');

