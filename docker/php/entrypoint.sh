#!/bin/bash

if [ -d "/code/vendor" ]; then
	composer update
else
	composer install
fi

chown -R www-data:www-data /code/*

#artisan commands
php artisan migrate;

#native entrypoint
/bin/importas -D /usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin PATH PATH
/etc/s6/init/init-stage1 $@