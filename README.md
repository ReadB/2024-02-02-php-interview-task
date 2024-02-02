# 2024-02-02-php-interview-task

#### Start php container in the background:
Run `$ docker compose up -d`

#### Connect to php container with bash shell:
Run `$ docker compose exec php /bin/bash`

#### Install dependencies:
Run `# composer install`

#### Before running script
Put the puzzle input in the src/Input file.

#### Run script
Run `# php src/main.php`

#### Run tests
Run `# ./vendor/bin/phpunit --testdox --colors tests`