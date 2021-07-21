<div class="content">
  <div class="day-container nav-content">
    <style>
      .nav-content hr {
        opacity: 0.2;
      }
    </style>
    <h2><span class="day">Settings</span></h2>

    <?php if($themeen=='true'): ?>
    <!--Theme-->
    <div class="theme">
      <h3>Theme</h3>
      <div class="theme-change">
        <button onclick="themelight()" class="theme-control-btn lighttgl <?php if($theme=='light'){echo'activetoggle';} ?>">Light</button>
        <button onclick="themedark()" class="theme-control-btn darktgl <?php if($theme=='dark'){echo'activetoggle';} ?>">Dark</button>
        <button onclick="themeblack()" class="theme-control-btn blacktgl <?php if($theme=='black'){echo'activetoggle';} ?>">Black</button>
        <button onclick="theme_solid_black()" class="theme-control-btn blacksolidtgl <?php if($theme=='blacksolid'){echo'activetoggle';} ?>">Black Solid</button>
      </div>
    </div>

    <br><hr><br>
    <?php endif; ?>

    <!--Usage guide-->
    <div class="actions">
      <h3>Actions</h3>
      <a href="../logout.php?err=logout" class="folderbacklink"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a><br>
    </div>

    <br><hr><br>

    <!--Usage guide-->
    <div class="guide">
      <h3>Useful Links</h3>
      <a href="extras/getting-started/getting-started.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Getting Started Document</a><br>
      <a href="extras/change-log.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Change Log</a><br>
      <a href="extras/bug-log.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Bug Log</a><br>
      <a href="bug.php" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Submit a Issue</a><br>
      <a href="extras/pwa-install/index.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;View how to install our apps</a><br>
    </div>

    <br><hr><br>

    <!--Daily Goal-->
    <div class="dailygoal">
      <h3>Daily Goal</h3>
      <span>Daily Completion Goal:</span>&nbsp;<input type="text" class="form-control-settings daily-goal" id="daily-goal" style="width: 100px;" value="<?php echo $goal; ?>">
    </div>

    <br><hr><br>

    <!--Reminder-->
    <div class="dailygoal">
      <h3>Reminder</h3>
      <form method="POST" class="reminderstatus">
        <span>Reminder status:</span>&nbsp;
        <select class="form-control-settings" style="width:100px;" name="reminder">
          <option value="true" <?php if($userreminderen=='true'){echo'selected ';}?>>Enabled</option>
          <option value="false" <?php if($userreminderen=='false'){echo'selected ';}?>>Disabled</option>
        </select>
        <input type="submit" id="submit" class="form-control-submit" value="Update">
      </form>
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
        <input type="text" name="firstname" required placeholder="First Name" class="form-control-settings form-control-settings-change" value="<?php echo $firstname; ?>">&nbsp;&nbsp;
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
        <input type="text" placeholder="Type OLD Password Here" name="passwordold" class="form-control-settings form-control-settings-change">&nbsp;&nbsp;
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
      <h3>Change Account Token</h3>
      <p>This will log out you and every other account signed into you account. If you suspect you have an unauthorized login, change your password then refresh your token.</p>
      
      <a class="folderbacklink links-border" href="scripts/settings/token-refresh.php" style="color: #0962b9;">Refresh account token&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
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
      
      <a href="admin/index.php?p=main" class="folderbacklink"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Admin Dashboard/Management</a><br>
    </div>
    <?php endif; ?>

    <br><br><br>

  </div>
</div>