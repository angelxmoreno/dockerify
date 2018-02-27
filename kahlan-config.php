<?php
/**
 * @var Kahlan\Cli\Kahlan $this
 */

$spec_dir = implode(DS, [
    __DIR__,
    'tests',
    'specs',
    '',
]);
echo PHP_EOL . $spec_dir . PHP_EOL;

/** @var \Kahlan\Cli\CommandLine $commandLine */
$commandLine = $this->commandLine();
$commandLine->add('spec', $spec_dir);
