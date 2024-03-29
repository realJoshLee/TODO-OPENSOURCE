# Tasks - By Josh Lee
## _A minimal and useful task manager that you control._
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Notice
Absolutely no extra support will be given other than what is found in the support docs. There will be no email support. We are not responsible for any data loss or data corruption. We are not responsible for warranties being voided by installing this software. We're not responsible for any data being leaked from a hack on your deployment. 
By downloading, you are agreeing to this notice.

## Updating
All of the users data is pulled from a MariaDB SQL server so updating code to a newer release is as simple as it can be. When a new relase comes along, download the code from the repo and place it on your web server. After you place the new version on your web server, setup the config file in the init folder to point and login to your database to pull existing tasks.

## Features
- Open source, so you can self host this on your server and have control over your data.
- Whitelist domains so you don't have random people creating accounts.
- Fully disable account creation if you don't have the need for any users to be creating accounts.
- Minimal UI with Light and Dark themes.
- Entirely built on HTML, PHP, CSS, JavaScript, and JQuery. That means that there isn't any compiling to be done to edit this. Edit some code and push it to your web server.

## Setup
1. Push all files to your webserver.
2. Navigate to the following URL and finish the setup: https://yourdomain.com/setup.php
(For updating, please make sure that you update or save the config file in the init to point to your database server.)

## License
This form isn't required but it's nice to see the quanity of who self hosts our app and to have emails incase of we need to notify our users. This data is not sold or rented to other companies.
[Self Host Form](https://tasks.hstly.net/self-host-register.php)

MIT
