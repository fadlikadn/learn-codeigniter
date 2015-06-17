#############################
CodeIgniter with Doctrine ORM
#############################

This repository use to give example integration between CodeIgniter 3 and Doctrine ORM.

*********
Stage
*********
-  `Development : 127.0.0.3`
-  `Testing : 127.0.0.4`
-  `Production : learnci.io`

*********
Resources
*********
-  `Integrating CodeIgniter 3 with Doctrine ORM <http://blog.beheist.com/integrating-codeigniter-and-doctrine-2-orm-with-composer/>`_
-  `Load Doctrine library every load Controller <http://wildlyinaccurate.com/integrating-doctrine-2-with-codeigniter-2/>`_
-  `Example of using Doctrine with CodeIgniter <http://joelverhagen.com/blog/2011/05/setting-up-codeigniter-2-with-doctrine-2-the-right-way/>`_
-  `Getting Started using Doctrine <http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/getting-started.html>`_


*********
Support RESTful API using CodeIgniter (Update 17 June 2015)
*********
-  `Codeigniter RestServer Library <https://github.com/chriskacerguis/codeigniter-restserver>`_
-  `Example of using CodeIgniter RestServer Library <https://github.com/awhitney42/codeigniter-restserver-resources>`_
-  `How To Handling Request RestServer <https://github.com/chriskacerguis/codeigniter-restserver#handling-requests>`_
-  `RESTful API Design Implementation using CodeIgniter <http://www.slideshare.net/appleboy/restful-api-design-implementation-with-codeigniter-php-framework?related=1>`_
-  `RESTful Service with CodeIgniter Part 1 <http://outergalactic.org/blog/restful-services-with-codeigniter/>`_
-  `RESTful Service with CodeIgniter Part 2 <http://adamwhitney.net/blog/?p=707>`_

*********
Sample Call RESTful API Service
*********
-  http://127.0.0.3/Example/users
-  http://127.0.0.3/Example/user?id=1 
-  http://127.0.0.3/Example/user?id=3&format=xml 
-  http://127.0.0.3/Example/user?id=3&format=csv

*********
Future Plan
*********
-  Integrating CodeIgniter and Doctrine ORM



Example of Apache Configuration :

`
<VirtualHost 127.0.0.3:80>
	ServerName learnci.io/
	#ServerAlias test.learnci.io
	ServerAdmin admin@learnci.io
	DocumentRoot /home/fadlika/Documents/learncodeigniter
	#DocumentRoot /var/www/learncodeigniter

	<Directory /home/fadlika/Documents/learncodeigniter>
	#<Directory /var/www/learncodeigniter>
		# This relaxes Apache security settings.
		AllowOverride all
		
		# MultiViews must be turned off.
		Options -MultiViews
		Allow from all
		# Uncomment this if you're on Apache >= 2.4:
		Require all granted
		PassengerBufferResponse off
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
	#Include conf-available/serve-cgi-bin.conf
</VirtualHost>

<VirtualHost 127.0.0.4:80>
	ServerName learnci2.io/
	ServerAdmin admin@learnci2.io
	DocumentRoot /home/fadlika/Documents/learncodeigniter
	#DocumentRoot /var/www/learncodeigniter

	<Directory /home/fadlika/Documents/learncodeigniter>
	#<Directory /var/www/learncodeigniter>
		# This relaxes Apache security settings.
		AllowOverride all
		
		# MultiViews must be turned off.
		Options -MultiViews
		Allow from all
		# Uncomment this if you're on Apache >= 2.4:
		Require all granted
		PassengerBufferResponse off
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
	#Include conf-available/serve-cgi-bin.conf
</VirtualHost>

`


###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<http://www.codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.4 or newer is recommended.

It should work on 5.2.4 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <http://www.codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <http://www.codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community IRC <http://www.codeigniter.com/irc>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.