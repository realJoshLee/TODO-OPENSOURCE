<?php

  // Starts the session for the document
  session_start();

  // This clears all of the sesion data(Data that keeps the user logged in)
  if(session_destroy()) // Destroying All Sessions 

  // Redirects the user to the home login page
  header("Location: ../index.php?action=login"); // Redirecting To Home Page
?>