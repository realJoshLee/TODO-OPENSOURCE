<?php
  // Please configure this for the email verification part of the app
  // The service that we use for email verification is mailjet
  //
  //
  //
  //
  // If you don't want to use the verify service, in the database
  // in the passwordlogin table, change the default for verified
  // to true and that will turn it off. If you do want to configure it,
  // go to mailjet.com and setup API keys with them.

  $fromemail = "";
  $fromname = "";

  $apipublic = '';
  $apiprivate = '';

  $body = "<h2>Please type the code back in on the page.</h2><br><h2>".$verifycode."</h2>";