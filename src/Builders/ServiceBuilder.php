<?php

namespace Dockerify\Builders;

/**
 * Class ServiceBuilder
 *
 * @package Dockerify\Builders
 */
class ServiceBuilder
{
    public $defaults
        = [
            'fpm' =>
                [
                    'container_name' => '${APP_NAME}-fpm',
                    'image'          => 'angelxmoreno/php-fpm-alpine',
                    'restart'        => 'always',
                    'volumes'        =>
                        [
                            '.:/var/www/html',
                            './docker/config/fpm/ini/sessions.ini:/usr/local/etc/php/conf.d/redis_session.ini',
                            './docker/config/fpm/ini/date.ini:/usr/local/etc/php/conf.d/date.ini',
                            './docker/config/fpm/ini/memory.ini:/usr/local/etc/php/conf.d/memory.ini',
                        ],

                    'links' =>
                        [
                            'mysql',
                            'redis',
                            'mongo',
                            'search',
                        ],

                ],

            'web' =>
                [
                    'container_name' => '${APP_NAME}-nginx',
                    'image'          => 'nginx:1.13-alpine',
                    'restart'        => 'always',
                    'links'          =>
                        [
                            'fpm',
                        ],

                    'ports' =>
                        [
                            '${PORT_PREFIX}11:80',
                        ],

                    'volumes' =>
                        [
                            './docker/config/nginx/site.conf:/etc/nginx/conf.d/_site.conf:ro',
                        ],

                    'volumes_from' =>
                        [
                            'fpm',
                        ],

                ],

            'mysql' =>
                [
                    'container_name' => '${APP_NAME}-mysql',
                    'image'          => 'mariadb:10.1',
                    'restart'        => 'always',
                    'environment'    =>
                        [
                            'MYSQL_ROOT_PASSWORD=${APP_NAME}',
                            'MYSQL_USER=${APP_NAME}',
                            'MYSQL_PASSWORD=${APP_NAME}',
                            'MYSQL_DATABASE=${APP_NAME}',
                        ],

                    'volumes' =>
                        [
                            './docker/data/mysql/:/var/lib/mysql',
                        ],

                    'ports' =>
                        [
                            '${PORT_PREFIX}12:3306',
                        ],

                ],

            'redis' =>
                [
                    'container_name' => '${APP_NAME}-redis',
                    'image'          => 'redis:3.2-alpine',
                    'restart'        => 'always',
                    'ports'          =>
                        [
                            '${PORT_PREFIX}13:6379',
                        ],

                    'command' => 'redis-server --appendonly yes',
                    'volumes' =>
                        [
                            './docker/data/redis/:/data',
                        ],

                ],

            'mongo' =>
                [
                    'container_name' => '${APP_NAME}-mongo',
                    'image'          => 'mongo:3.0',
                    'restart'        => 'always',
                    'volumes'        =>
                        [
                            './docker/data/mongo/:/data/db',
                        ],

                    'ports' =>
                        [
                            '${PORT_PREFIX}14:27017',
                        ],

                ],

            'search' =>
                [
                    'container_name' => '${APP_NAME}-search',
                    'image'          => 'elasticsearch:2.4-alpine',
                    'restart'        => 'always',
                    'volumes'        =>
                        [
                            './docker/data/search:/usr/share/elasticsearch/data',
                        ],

                    'ports' =>
                        [
                            '${PORT_PREFIX}15:${PORT_PREFIX}00',
                            '${PORT_PREFIX}16:9300',
                        ],

                ],

            'node' =>
                [
                    'container_name' => '${APP_NAME}-node',
                    'image'          => 'node:',
                    'user'           => 'node',
                    'working_dir'    => '/home/node/app',
                    'environment'    =>
                        [
                            'NODE_ENV=production',
                        ],

                    'volumes' =>
                        [
                            './:/home/node/app',
                        ],

                    'expose' =>
                        [
                            '8081',
                        ],

                    'command' => 'npm start',
                ],
        ];
}
