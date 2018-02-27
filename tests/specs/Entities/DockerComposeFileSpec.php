<?php

use Dockerify\Entities\DockerComposeFile;
use Dockerify\Collections\DockerServicesCollection;
use Dockerify\Entities\DockerService;
use Cake\Utility\Inflector;

describe('', function () {
    describe('DockerComposeFile::addService()', function () {
        it('allows services to be added', function () {
            $file    = new DockerComposeFile();
            $service = new DockerService();
            $file->addService($service);

            expect($file->getServices()->first())
                ->toBe($service);
        });
    });

    describe('Getters/Setters', function () {
        $props = [
            'project_name' => 'Some Project',
            'version'      => 999,
            'services'=> new DockerServicesCollection([new DockerService()])
        ];

        foreach ($props as $prop => $val) {
            $setter  = 'set' . Inflector::camelize($prop);
            $getter  = 'get' . Inflector::camelize($prop);
            $c_title = sprintf('DockerComposeFile::$%s', $prop);
            $d_title = sprintf('%s/%s', $getter, $setter);
            $i_title = sprintf('allows the property $%s to be set and get(gotten)', $prop);

            context($c_title, function () use ($d_title, $i_title, $setter, $getter, $val) {
                describe($d_title, function () use ($d_title, $i_title, $setter, $getter, $val) {
                    it($i_title, function () use ($d_title, $i_title, $setter, $getter, $val) {
                        $file = new DockerComposeFile();
                        $file->{$setter}($val);
                        $actual = $file->{$getter}();

                        expect($actual)
                            ->toBe($val);
                    });
                });
            });
        }
    });
});