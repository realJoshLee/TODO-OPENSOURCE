<div class="content">
  <div class="day-container nav-content">
    <style>
      .nav-content hr {
        opacity: 0.2;
      }
    </style>
    <h2><span class="day">Settings</span></h2>

    <!--Theme-->
    <div class="theme">
      <h3>Theme</h3>
      <div class="theme-change">
        <button onclick="themelight()" class="theme-control-btn lighttgl <?php if($theme=='light'){echo'activetoggle';} ?>">Light</button>
        <button onclick="themedark()" class="theme-control-btn darktgl <?php if($theme=='dark'){echo'activetoggle';} ?>">Dark</button>
        <button onclick="themeblack()" class="theme-control-btn blacktgl <?php if($theme=='black'){echo'activetoggle';} ?>">Black</button>
      </div>
    </div>

    <br><hr><br>

    <!--Usage guide-->
    <div class="actions">
      <h3>Actions</h3>
      <a href="../logout.php" class="folderbacklink"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a><br>
    </div>

    <br><hr><br>

    <!--Usage guide-->
    <div class="guide">
      <h3>Useful Links</h3>
      <a href="extras/getting-started/getting-started.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Getting Started Document</a><br>
      <a href="extras/change-log.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Change Log</a><br>
      <a href="extras/bug-log.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Bug Log</a><br>
      <a href="bug.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Submit a Issue</a><br>
    </div>

    <br><hr><br>

    <!--Daily Goal-->
    <div class="dailygoal">
      <h3>Daily Goal</h3>
      <span>Daily Completion Goal:</span>&nbsp;<input type="text" class="form-control-settings daily-goal" id="daily-goal" style="width: 100px;" value="<?php echo $goal; ?>">
    </div>

    <br><hr><br>

    <!--Recovery Code-->
    <div class="dailygoal">
      <h3>Recovery Code</h3>
      <p>This is your recovery code. Use this to recover your account when you loose access. Do not share this with anyone.<br><span class="blue"><?php echo $recovery; ?></span></p>
    </div>

    <br><hr><br>
    
    <!--Change Details-->
    <div class="details">
      <h3>Change Account Name:</h3>
      <form id="name-form" method="POST">
        <input type="text" name="firstname" required placeholder="First Name" class="form-control-settings form-control-settings-change" value="<?php echo $firstname; ?>"><br>
        <input type="text" name="lastname" required placeholder="Last Name" class="form-control-settings form-control-settings-change" value="<?php echo $lastname; ?>"><br>
        <input type="submit" required value="Change Email" class="form-control-submit save-btn-style">
      </form>

      <br>

      <h3>Change Email:</h3>
      <p>Current Email: <?php echo $accountemail; ?></p>
      <form action="scripts/settings/change-email.php" method="POST">
        <input type="text" name="email" required placeholder="Set New Email" class="form-control-settings form-control-settings-change"><br>
        <input type="submit" required value="Change Email" class="form-control-submit save-btn-style">
      </form>

      <br>

      <!--Change Password-->
      <h3>Change Master Password:</h3>
      <form action="scripts/settings/change-password.php" method="POST">
        <input type="text" placeholder="Type OLD Password Here" name="passwordold" class="form-control-settings form-control-settings-change"><br>
        <input type="text" placeholder="Type NEW Password Here" name="passwordnew" class="form-control-settings form-control-settings-change"><br>
        <input type="submit" class="form-control-submit save-btn-style" value="Change Password">
      </form>

      <br>

      <!--Timezone-->
      <h3>Timezone:</h3>
      <form method="POST" id="timezone-form">
        <select name="timezone" class="form-control-settings" style="width: 250px;">
        <?php foreach($timezones as $item): ?>
          <option value="<?php echo $item; ?>" <?php if($tz==$item){echo 'selected';} ?>><?php echo $item; ?></option>
        <?php endforeach; ?>
        </select>
        
        <br><br>

        <input type="submit" class="form-control-submit save-btn-style" value="Change Timezone">
      </form>
    </div>

    <br><hr><br>

    <!--Download Extension-->
    <div class="download">
      <h3>Download Extension</h3>
      <a href="../privacy-terms.html" class="folderbacklink">View our privacy policy before downloading our apps.</a><br><br>
      
      <a href="https://chrome.google.com/webstore/detail/tasks/lgmlfpjlkmlnnbenpfijaaggkobfbaam?hl=en&authuser=0" class="folderbacklink"><i class="fab fa-chrome"></i>&nbsp;&nbsp;Get Chrome Extension</a><br>
      <a href="https://chrome.google.com/webstore/detail/tasks/lgmlfpjlkmlnnbenpfijaaggkobfbaam?hl=en&authuser=0" class="folderbacklink"><i class="fab fa-edge"></i>&nbsp;&nbsp;Get Microsoft Edge Extension Extension</a><br>
      <a href="https://www.dropbox.com/s/ddsv6mtp54fhyem/android.apk?dl=0" class="folderbacklink"><i class="fab fa-android"></i>&nbsp;&nbsp;Get Android App</a><br>
      <a href="https://www.dropbox.com/s/z7sxkj8kgcvyf74/windows-v2.exe?dl=0" class="folderbacklink"><i class="fab fa-windows"></i>&nbsp;&nbsp;Get Windows App</a><br>
    </div>

    <br><hr><br>

    <!--Download Extension-->
    <div class="download">
      <h3>Delete Account</h3>
      <p>You're about to delete your account. This will delete everything (Tasks, folders, account data, etc). This action can't be undone and nothing can be recovered</p>
      
      <a class="delete-account-button delete-account-button-style"><i class="far fa-trash-alt"></i> Delete My Account</a>

      <div class="del-outer">
        <div class="delete-box">
          <a href="scripts/delete.php" class="delete-account-button-in-box"><i class="far fa-trash-alt"></i> Yes Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" class="delcancel"><i class="far fa-times-circle"></i> No Don't Delete</a>
        </div>
      </div>
    </div>

    <?php if($admin=='true'): ?>
    <br><hr><br>

    <!--Download Extension-->
    <div class="download">
      <h3>Admin Actions</h3>
      <p>Only admins can see this section.</p>
      
      <a href="../admin/index.php?p=rollout" class="folderbacklink"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Rollout Management</a><br>
      <a href="../admin/index.php?p=users" class="folderbacklink"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;User Management</a><br>
    </div>
    <?php endif; ?>

    <br><br><br>

  </div>
</div>