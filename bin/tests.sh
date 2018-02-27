#!/bin/bash

set -e

docker run -t --rm -v $(pwd):/app -w /app angelxmoreno/php-fpm-alpine php ./bin/kahlan  --reporter=verbose --coverage=4 "$0"