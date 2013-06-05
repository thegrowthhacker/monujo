#!/bin/bash

BUILDER_HOME=./
PROJECT_HOME=$BUILDER_HOME/../
ENV="local"

install() {
	_initialize_laravel_stuff;
}

_initialize_laravel_stuff() {
	cd $PROJECT_HOME
	php artisan key:generate
	php artisan migrate --package=cartalyst/sentry --env=$ENV
	php artisan migrate --env=$ENV
	php artisan db:seed --env=$ENV
}

execute_target() {
	command_exists () {
	    type "$1" &> /dev/null;
	}

	echo "requested $# targets $@";
	
	for target in $@; do
         if command_exists $target; then
            echo "executing target $target";
          	$target;
         else
             echo "target $target does not exist";
            exit;
         fi
	done
	echo "done";
}

execute_target $@;







