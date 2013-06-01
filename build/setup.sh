#!/bin/bash

cd ..

php artisan key:generate

php artisan migrate --package=cartalyst/sentry --env=local

php artisan migrate --env=local

php artisan db:seed --env=local




