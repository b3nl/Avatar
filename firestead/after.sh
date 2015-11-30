#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
cd /vagrant/
curl -sS https://getcomposer.org/installer | php
php composer.phar install --no-ansi --no-interaction --no-progress --no-scripts --optimize-autoloader
php artisan migrate
php artisan db:seed
