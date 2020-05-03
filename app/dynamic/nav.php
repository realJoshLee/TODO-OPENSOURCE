<span class="navbutton switch-two" style="font-size:30px;cursor:pointer" onclick="smallnav()">&nbsp;<i class="fas fa-bars black"></i>&nbsp;&nbsp;&nbsp;</span>

<a href="index.php?page=week" class="nav-link"><i class="fas fa-calendar-week"></i><span class="none-small">&nbsp;&nbsp;My Week</span></a><br>
<a href="index.php?page=today" class="nav-link"><i class="fas fa-calendar-day"></i><span class="none-small">&nbsp;&nbsp;Today</span></a><br>
<a href="index.php?page=starred" class="nav-link"><i class="fas fa-star"></i><span class="none-small">&nbsp;Starred</span></a>

<br>

<?php foreach($folders as $item): ?>
  <?php $decrypted = openssl_decrypt(base64_decode($item['foldername']), $method, $key, OPENSSL_RAW_DATA, $iv); ?>
  <a href="?folder=<?php echo $item['foldername']; ?>" class="nav-link"><?php echo $decrypted; ?></a>
<?php endforeach; ?>
<form action="add-folder.php" method="post">
  &nbsp;&nbsp;<input onchange="this.form.submit()" type="text" name="foldernameadd" placeholder="Folder To Add" class="folderadd">
</form>
<style>
  .folderadd {
    border: 1px solid #f5f5f5;
    background-color: transparent;
  }
</style>

<div class="dropdown">
  <a href="account.php" class="nav-link"><i class="fas fa-cog"></i><span class="none-small"> Settings</span></a>
  <div class="dropdown-content">
    <p><?php echo $_SESSION['username']; ?>
    <br><br>
    <a href="account.php" class="link-dropdown">Account</a><br>
    <a href="history.php" class="link-dropdown">Task History</a><br>
    <a href="logout.php" class="link-dropdown">Logout</a>
    <style>
      a.link-dropdown {
        font-size: 16px;
      }
    </style>
  </div>
</div>