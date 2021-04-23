# Tasks - By Josh Lee
## _A minimal and useful task manager that you control._
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Updating
All of the users data is pulled from a MariaDB SQL server so updating code to a newer release is as simple as it can be. When a new relase comes along, download the code from the repo and place it on your web server.

## Features
- Open source, so you can self host this on your server and have control over your data.
- Whitelist domains so you don't have random people creating accounts.
- Minimal UI with Light and Dark themes.
- Entirely built on HTML, PHP, CSS, JavaScript, and JQuery. That means that there isn't any compiling to be done to edit this. Edit some code and push it to your web server.

## Setup
1. Run the 'database-configure.sql' file located in the 'app/init/' folder.
2. Configure database connection and encryption in the 'config.php' file in the 'app/init/' folder.

## Setup Pt.2 (In a web interface)
1. Navigate to the url of ur hosted instance.
2. Create an account.
3. Log into the database and set your account as admin.
4. Navigate to the setting and click on the admin button at the bottom of the settings page.
5. Open the side nav and click on 'App Settings'.
6. Configure all of the settings that you would like to change.
7. If you don't want to setup emails to be sent to users. Disable 'Magic Link Page' and 'Verification' by setting them to false and leave everything Mailjet related blank (Mailjet items are labeled as Mailjet required.)

## Configure domain whitelist
1. Go to the admin page (Follow step 1-5 in 'Setup Pt.2')
2. Enable 'Whitelist' by setting it to 'true'
3. Update whitelisted domains in 'app/init/config.php'. Make it the domain of the email account. (i.e.: example@gmail.com you would whitelist gmail.com )
4. Click 'Update Content'

## Disable user email verification
1. Go to the admin page (Follow step 1-5 in 'Setup Pt.2')
2. Set 'Verification' to 'false'
3. Click 'Update Content'

## Mark other users as admins
1. Go to the admin page (Follow step 1-5 in 'Setup Pt.2')
2. Open the side nav and click on 'Users'
3. Click on the user that you would like to promote to an admin. (There will be a icon in the admin section if a user if an admin.)
4. Scroll down to Stats and click on the green button under the admin section.

## License
This form isn't required but it's nice to see the quanity of who self hosts our app and to have emails incase of we need to notify our users. This data is not sold or rented to other companies.
[Self Host Form](https://tasks.hstly.net/self-host-register.php)

MIT
