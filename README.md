# Tasks - By Josh Lee
## _A minimal and useful task manager that you control._
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Overview
I could never find a nice elegant task manager where I had control over all of my data. Tasks is a simple task manager that contains advanced features from high end task managers like Todoist, Tick Tick, and Things 3. This is all provided for free and able to be self hosted!

## Updating
All of the users data is pulled from a MariaDB SQL server so updating code to a newer release is as simple as it can be. When a new relase comes along, download the code from the repo and place it on your web server.

## Features
- Open source, so you can self host this on your server and have control over your data.
- Whitelist domains so you don't have random people creating accounts.
- Minimal UI with Light and Dark themes.
- Entirely built on HTML, PHP, CSS, JavaScript, and JQuery. That means that there isn't any compiling to be done to edit this. Edit some code and push it to your web server.

## Setup
1. Run the 'database-configure.sql' file located in the 'configure' folder.
2. Configure everything in the 'config.php' file in the 'app/init/' folder.
3. Setup and configure 'mailjet.com' and configure '$fromemail' with the email address you have configured, set the name value you want under '$fromname', set your '$apipublic' and '$apiprivate' keys provided to you in the 'mailjet.com' setup.

## Configure domain whitelist
1. Navigate to 'app/init/' and edit the 'config.php' file.
2. If you would like to enable whitelist update the '$whitelistacti' to 'true' and if you would like to disable the whitelist set the value to 'false'.
3. To add/remove a domain to the whitelist add/remove a value on the array '$whitelist'. Add everything like 'example.com', 'domain.com' not like 'john.doe@example.com' the whitelist function will not work.

## Disable user email verification
1. Open a SQL editor program and connect to your server. (I use HeidiSQL for SQL database editing).
2. Open the 'passwordlogin' table under the 'webapps' database.
3. Set the default of the 'verified' row to 'true'.

## License
This form isn't required but it's nice to see the quanity of who self hosts our app and to have emails incase of we need to notify our users. This data is not sold or rented to other companies.
[Self Host Form](https://tasks.hstly.net/self-host-register.php)
MIT