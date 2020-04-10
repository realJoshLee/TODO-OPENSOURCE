<?php
require_once 'init.php';

if(isset($_POST['name'])){
	$name = trim($_POST['name']);

	if(!empty($name)){
		$addedQuery = $db->prepare("
			INSERT INTO tasks (name, user, folder, done, created)
			VALUES (:name, :user, :folder, 0, NOW())
			");
		$addedQuery->execute([
			'name' => $name,
      'user' => $_SESSION['user_id'],
      'folder' => "personal"
			]);
	}
}

header('Location: personal.php');
?>