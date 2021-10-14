<?php
include('../../app/init/init.php');
require '../all.php';

if (isset($_POST["add"])) {
  $addQuery = $db->prepare("
    INSERT INTO tasks_rollout (tag, users)
    VALUES (:tag, :users)
  ");
      
  $addQuery->execute([
    ':tag' => $_POST['tag'],
    ':users' => $_POST['users'],
  ]);

  header('location: ../index.php?p=rollout');
}
?>
<div class="content">
  <h2>Add Rollout Rule</h2>
  <form method="POST">
    <p>Tag: </p>
    <select name="tag" class="form-control">
      <option value="stable">stable</option>
      <option value="beta" selected>beta</option>
    </select>

    <br><br>

    <p>User: (Enter user email for 'all' for all users)</p>
    <input type="text" name="users" placeholder="Users" class="form-control">

    <br><br>

    <input type="submit" name="add" value="Add Rollout Rule" class="form-control-submit">
  </form>
</div>

<style>
  html, body {
    font-family: Arial;
  }

  div.content {
    padding-left: 20%;
    padding-right: 20%;
  }

  .form-control {
    width: 300px;
    background: none;
    border: 1px solid #ddd;
    padding: 3px;
  }

  input.form-control-submit {
    width: 300px;
    background: none;
    background: #006fff;
    color: #fff;
    outline: none;
    border: none;
    border-radius: 5px;
    padding: 5px;
  }
</style>