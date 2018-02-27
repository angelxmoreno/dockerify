<?php

namespace Dockerify\Commands;

use Dockerify\Entities\DockerComposeFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class GenerateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate')
            ->setDescription('Generates a Docker Compose File')
            ->setHelp('This command allows you to create a docker-compose yaml file');

        $this
            ->addArgument('project_name', InputArgument::REQUIRED, 'The name of the Project');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '',
            'DockerFile Creator',
            '==================',
            '',
        ]);

        $docker_file = new DockerComposeFile();
        $docker_file->setProjectName($input->getArgument('project_name'));

        $path   = __DIR__ . '/../../docker-compose.yml';
        $parsed = Yaml::parseFile($path);
        print_r($parsed);

        die;
        $props = [];
        // retrieve the argument value using getArgument()
        $output->writeln('Project Name: ' . $input->getArgument('project_name'));
    }
}
