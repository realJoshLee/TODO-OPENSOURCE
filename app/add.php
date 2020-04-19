<?php
require_once 'init.php';

// Gets the current day to highlight the current day in the task listing.
// When the screen gets to small, this will also scroll the user down the current day.
$tz = 'America/Detroit';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
$datetime = $dt->format('M.d.Y g:i:s A');
$date = $dt->format('M.d.Y');
$day = $dt->format('D');

if($day == 'Sun') {
  $today = "sunday";
} 

if($day == 'Mon') {
  $today = "monday";
} 

if($day == 'Tue') {
  $today = "tuesday";
} 

if($day == 'Wed') {
  $today = "wednesday";
} 

if($day == 'Thu') {
  $today = "thursday";
} 

if($day == 'Fri') {
  $today = "friday";
} 

if($day == 'Sat') {
  $today = "saturday";
} 

if (isset($_GET['day'], $_POST['name'])) {
  $day = $_GET['day'];
  $namepre = $_POST['name'];
  $name = base64_encode(openssl_encrypt($namepre, $method, $key, OPENSSL_RAW_DATA, $iv));

  switch ($day) {
    case 'sunday':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "sunday"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'monday':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "monday"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'tuesday':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "tuesday"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'wednesday':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "wednesday"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'thursday':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "thursday"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'friday':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "friday"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'saturday':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "saturday"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'inbox':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "inbox"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'today':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => $today
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    }
  }
?>