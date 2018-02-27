#!/usr/bin/env php
<?php
// application.php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Dockerify\Commands\GenerateCommand;

$application = new Application();

$application->addCommands([new GenerateCommand()]);

try {
    $application->run();
} catch (\Exception $e) {
    echo PHP_EOL . 'Error found:' . print_r($e) . PHP_EOL;
}
