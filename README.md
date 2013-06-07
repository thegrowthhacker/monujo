##Monujo
[![Build Status](https://secure.travis-ci.org/monujo/monujo.png)](http://travis-ci.org/monujo/monujo)

Personal finance planning.
Check out our [wiki](https://github.com/monujo/monujo/wiki) for further information about using and contributing to the project.

-----

##How to Install
###Requirements
* php > 5.3.7 with mycrypt extension installed
* php cli installed on a *nix machine (or windows with cygwin).
* mySql > 5

###1) Downloading
####1.1) Clone the develop branch

	git clone -b develop http://github.com/monujo/monujo


###2) Install the Dependencies via Composer
#####2.1) If you don't have composer installed globally

	cd your-folder
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --dev

*installing with `--dev` flag allows you to run test in your local environment. This is not intended for a production environment*


#####2.2) For globally composer installations

	cd your-folder
	composer install

-----

###3) Setup Database
Create a new database.

***The application runs using a `local` environment binded to your localhost.
You can change this behavior modifying the laravel environment handling in `bootstrap/start.php`***

Now that you have the Monujo project cloned and all the dependencies installed, you need to create a database for it.

After the database is created, open the file `app/config/local/database.php` and update the needed entries.

-----

###4) Setup Database
Monujo send email so you need to configure your outgoing mail server under `app/config/local/mail.php`.

-----

###5) Install

cd into the build folder and from your command line run:

	chmod +x build.sh
	./buld.sh install

***note that if you have changed the `local` environment you need to update the setup.sh file in order to runs migration on your specific environment***

You can now login to the application with:

	email: admin@admin.com
	password: admin
