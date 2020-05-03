<?php
require_once 'init.php';

// Gets the current day to highlight the current day in the task listing.
// When the screen gets to small, this will also scroll the user down the current day.
$tz = 'America/Detroit';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
$today = $dt->format('D');
$day = $dt->format('M.d.Y');
$date = $dt->format('D');

$yesterdaytime = new DateTime('yesterday');
$yesterday = $yesterdaytime->format('D.M.d.Y');

$tomorrowtime = new DateTime('tomorrow');
$tomorrow= $tomorrowtime->format('D.M.d.Y');

$twodaystime = new DateTime('+2 day');
$twodays = $twodaystime->format('D.M.d.Y');

$threedaystime = new DateTime('+3 day');
$threedays = $threedaystime->format('D.M.d.Y');

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
    case 'Sun':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "sun"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'Mon':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "mon"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'Tue':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "tue"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'Wed':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "wed"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'Thu':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "thu"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'Fri':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "fri"
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;
    
    case 'Sat':
      $doneQuery = $db->prepare("
        INSERT INTO todotasks (name, user, day, done, created)
        VALUES (:name, :user, :day, 0, NOW())
        ");

      $doneQuery->execute([
        'name' => $name,
        'user' => $_SESSION['user_id'],
        'day' => "sat"
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