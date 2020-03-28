<?php
// Please make sure to configure this with your database details
require_once '../app/init.php';

if (isset($_POST['email'])) {
  $emailtoverify = trim($_POST['email']);

  // In the prepare statement, make sure to set "users" to the database table where the usernames
  // and passwords are stored. Also, make sure that you have a "verified" column in the table.
  // Make sure to set "username" to the name of column where the emails/usernames are stored so
  // that this can find the account and verify it.
  $doneQuery = $db->prepare("
    UPDATE users SET verified = 1
    WHERE username = :emailtoverify
    ");

  $doneQuery->execute([
    // Grabs the email to verify from the last page
    'emailtoverify' => $emailtoverify
    ]);
  }

// Location where you want the use to go to when there account if verified.
header('Location: verify-success.html');