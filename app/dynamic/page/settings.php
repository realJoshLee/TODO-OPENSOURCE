<div class="content">
  <div class="day-container nav-content">
    <style>
      .nav-content hr {
        opacity: 0.2;
      }
    </style>
    <h2><span class="day">Settings</span></h2>
    <?php if($recovery=='LDAP'): ?>
      <div class="ldap-alert">
        <p>This is an account on an LDAP server. Limited account functions available. Please contact your domain admin to change your password.</p>
      </div>
    <?php endif; ?>

    <!--Logout-->
    <div class="actions">
      <h3 class="noselect">Actions</h3>
      <a href="../logout.php?err=logout" class="folderbacklink"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a><br>
    </div>

    <br>

    <!--Useful Links-->
    <div class="dropdown" id="dropdown-1">
      <div class="dd-controller">
        <div class="dd-controller-padding">
          <h3><span class="control-cnt"><span class="open" data-id="1"><i class="fas fa-plus"></i>&nbsp;&nbsp;Uesful Links</span><span class="close" data-id="1"><i class="fas fa-times"></i>&nbsp;&nbsp;Useful Links</span></span></h3>
        </div>

        <!--Dropdown content-->
        <div class="dd-content">
          <div class="dd-content-style">
            <br>
            <a href="extras/docs/index.html#generalUser" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Getting Started Document</a><br>
            <a href="extras/change-log.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Change Log</a><br>
            <a href="extras/bug-log.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Bug Log</a><br>
            <a href="bug.php" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;Submit a Issue</a><br>
            <a href="extras/pwa-install/index.html" target="_blank" class="folderbacklink links-border"><i class="fas fa-book"></i>&nbsp;&nbsp;View how to install apps and extensions</a><br>
            <a href="#" onclick="alertsactive()" class="folderbacklink links-border"><i class="fas fa-bell"></i>&nbsp;&nbsp;View alerts</a>
            <br><br>
          </div>
        </div>
      </div>
    </div>

    <!--Theme-->
    <?php if($themeen=='true'): ?>
    <div class="dropdown" id="dropdown-2">
      <div class="dd-controller">
        <div class="dd-controller-padding">
          <h3><span class="control-cnt"><span class="open" data-id="2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Theme</span><span class="close" data-id="2"><i class="fas fa-times"></i>&nbsp;&nbsp;Theme</span></span></h3>
        </div>

        <!--Dropdown content-->
        <div class="dd-content">
          <div class="dd-content-style">
            <br>
            <div class="theme">
              <div class="theme-change">
                <button onclick="themelight()" class="theme-control-btn lighttgl <?php if($theme=='light'){echo'activetoggle';} ?>">Light</button>
                <button onclick="themedark()" class="theme-control-btn darktgl <?php if($theme=='dark'){echo'activetoggle';} ?>">Dark</button>
              </div>
            </div>
            <br><br>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <!--Account-->
    <div class="dropdown" id="dropdown-3">
      <div class="dd-controller">
        <div class="dd-controller-padding">
          <h3><span class="control-cnt"><span class="open" data-id="3"><i class="fas fa-plus"></i>&nbsp;&nbsp;Account</span><span class="close" data-id="3"><i class="fas fa-times"></i>&nbsp;&nbsp;Account</span></span></h3>
        </div>

        <!--Dropdown content-->
        <div class="dd-content">
          <div class="dd-content-style">
            <br>
            
            <?php if($recovery!=='LDAP'): ?>
            <p><b>Change Account Name</b></p>
            <form id="name-form" method="POST">
              <input type="text" name="firstname" required placeholder="First Name" class="form-control-settings form-control-settings-change" value="<?php echo $firstname; ?>">&nbsp;&nbsp;
              <input type="text" name="lastname" required placeholder="Last Name" class="form-control-settings form-control-settings-change" value="<?php echo $lastname; ?>"><br>
              <input type="submit" required value="Change Name" class="form-control-submit save-btn-style">
            </form>

            <br><br>
            <?php endif; ?>

            <p><b>Change Email</b></p>
            <p>Current Email: <?php echo $accountemail; ?></p>
            
            <?php if($recovery!=='LDAP'): ?>
            <form action="scripts/settings/change-email.php" method="POST">
              <input type="text" name="email" required placeholder="Set New Email" class="form-control-settings form-control-settings-change"><br>
              <input type="submit" required value="Change Email" class="form-control-submit save-btn-style">
            </form>

            <br><br>

            <!--Change Password-->
            <p><b>Change Master Password</b></p>
            <form action="scripts/settings/change-password.php" method="POST">
              <input type="text" placeholder="Type OLD Password Here" name="passwordold" class="form-control-settings form-control-settings-change">&nbsp;&nbsp;
              <input type="text" placeholder="Type NEW Password Here" name="passwordnew" class="form-control-settings form-control-settings-change"><br>
              <input type="submit" class="form-control-submit save-btn-style" value="Change Password">
            </form>
            <?php endif; ?>
            
            <br><br>
          </div>
        </div>
      </div>
    </div>

    <!--General-->
    <div class="dropdown" id="dropdown-4">
      <div class="dd-controller">
        <div class="dd-controller-padding">
          <h3><span class="control-cnt"><span class="open" data-id="4"><i class="fas fa-plus"></i>&nbsp;&nbsp;General</span><span class="close" data-id="4"><i class="fas fa-times"></i>&nbsp;&nbsp;General</span></span></h3>
        </div>

        <!--Dropdown content-->
        <div class="dd-content">
          <div class="dd-content-style">
            <br>
            
            <!--Daily Goal-->
            <div class="dailygoal">
              <p><b>Daily Goal</b></p>
              <p>Set your daily task completion goal. You can view this in the top of the menu bar to the left.</p>
              <span>Daily Completion Goal:</span>&nbsp;<input type="text" class="form-control-settings daily-goal" id="daily-goal" style="width: 100px;" value="<?php echo $goal; ?>">
            </div>

            <br><br>

            <!--Timezone-->
            <p><b>Timezone</b></p>
            <form method="POST" id="timezone-form">
              <select name="timezone" class="form-control-settings" style="width: 250px;">
              <?php foreach($timezones as $item): ?>
                <option value="<?php echo $item; ?>" <?php if($tz==$item){echo 'selected';} ?>><?php echo $item; ?></option>
              <?php endforeach; ?>
              </select>
              
              <br><br>

              <input type="submit" class="form-control-submit save-btn-style" value="Change Timezone">
            </form>

            <br><br>

            <!--Reminder-->
            <div class="dailygoal">
              <p><b>Reminder</b></p>
              <form method="POST" class="reminderstatus">
                <p>Enable or disable reminders to be sent to your email. Reminders will be sent when you first load the app each day.</p>
                <span>Reminder Status:</span>&nbsp;
                <select class="form-control-settings" style="width:100px;" name="reminder">
                  <option value="true" <?php if($userreminderen=='true'){echo'selected ';}?>>Enabled</option>
                  <option value="false" <?php if($userreminderen=='false'){echo'selected ';}?>>Disabled</option>
                </select>
                <input type="submit" class="form-control-submit submit" value="Update">
              </form>
            </div>

            <br><br>

            <!--Background Sync-->
            <div class="backgroundsync">
              <p><b>Background Sync</b></p>
              <form method="POST" class="backgroundsyncform">
                <p>Enable or disable background sync. This will sync things like your theme and tasks across devices automatically without refreshing the page. If you're using this app with data, this may increase your data usage depending on how long the app is open.</p>
                <span>Background Sync Status:</span>&nbsp;
                <select class="form-control-settings" style="width:100px;" name="backgroundsyncval" id="bgsyncval">
                  <option value="true" <?php if($backgroundsync=='true'){echo'selected ';}?>>Enabled</option>
                  <option value="false" <?php if($backgroundsync=='false'){echo'selected ';}?>>Disabled</option>
                </select>
                <input type="submit" class="form-control-submit submit" value="Update">
              </form>

              <br>

              <p onclick="clearInterval(datasync)" class="blue" style="cursor:pointer;">Pause Data Sync This Session</p>
            </div>

            <br><br>
          </div>
        </div>
      </div>
    </div>

    <!--Tokens-->
    <div class="dropdown" id="dropdown-5">
      <div class="dd-controller">
        <div class="dd-controller-padding">
          <h3><span class="control-cnt"><span class="open" data-id="5"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tokens</span><span class="close" data-id="5"><i class="fas fa-times"></i>&nbsp;&nbsp;Tokens</span></span></h3>
        </div>

        <!--Dropdown content-->
        <div class="dd-content">
          <div class="dd-content-style">
            <br>

            <!--Identifier Code-->
            <div class="dailygoal">
              <p><b>Identifier Code</b></p>
              <p>This if your identifier code for your account that you will use for the Chrome Extension. This code has access to only add tasks to your account. Enable the toggle below to allow adding tasks from the extension.</p>
              <span class="blue" style="word-break: break-all;"><?php echo $identifier; ?></span><br>
              <form method="POST" class="extensionaddform">
                <select class="form-control-settings" style="width:100px;" name="extensionadd">
                  <option value="true" <?php if($extensionadd=='true'){echo'selected ';}?>>Enabled</option>
                  <option value="false" <?php if($extensionadd=='false'){echo'selected ';}?>>Disabled</option>
                </select>
                <input type="submit" class="form-control-submit submit" value="Update">
              </form>

              <br>
              <a class="folderbacklink links-border" href="sync/sync.php?as=identifierupdate" style="color: #0962b9;">Refresh account identifier</a>
            </div>

            <br><br>

            <!--Recovery Code-->
            <div class="dailygoal">
              <p><b>Recovery Code</b></p>
              <p>This is your recovery code. Use this to recover your account when you loose access. Do not share this with anyone.</p>
              <span class="blue"><?php echo $recovery; ?></span>
            </div>

            <br><br>

            <!--Download Extension-->
            <div class="download">
              <p><b>Change Account Token</b></p>
              <p>This will log out you and every other account signed into you account. If you suspect you have an unauthorized login, change your password then refresh your token.</p>
              
              <a class="folderbacklink links-border" href="scripts/settings/token-refresh.php" style="color: #0962b9;">Refresh account token&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
            </div>

            <br><br>

            <!--Download Extension-->
            <div class="refresh">
              <p><b>Force Update</b></p>
              <p>This will force update the app. This is useful if you have issues with scripts not loading correctly.</p>
              
              <a class="folderbacklink links-border" href="index.php?eraseCache=true" style="color: #0962b9;">Force Update App&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
            </div>

            <br><br>
          </div>
        </div>
      </div>
    </div>

    <?php if($recovery!=='LDAP'): ?>
    <!--Delete Account-->
    <div class="dropdown" id="dropdown-6">
      <div class="dd-controller">
        <div class="dd-controller-padding">
          <h3><span class="control-cnt"><span class="open" data-id="6"><i class="fas fa-plus"></i>&nbsp;&nbsp;Delete</span><span class="close" data-id="6"><i class="fas fa-times"></i>&nbsp;&nbsp;Delete</span></span></h3>
        </div>

        <!--Dropdown content-->
        <div class="dd-content">
          <div class="dd-content-style">
            <br>

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

            <br><br>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if($admin=='true'): ?>
    <!--Admin-->
    <div class="dropdown" id="dropdown-7">
      <div class="dd-controller">
        <div class="dd-controller-padding">
          <h3><span class="control-cnt"><span class="open" data-id="7"><i class="fas fa-plus"></i>&nbsp;&nbsp;Admins</span><span class="close" data-id="7"><i class="fas fa-times"></i>&nbsp;&nbsp;Admins</span></span></h3>
        </div>

        <!--Dropdown content-->
        <div class="dd-content">
          <div class="dd-content-style">
            <br>

            <!--Download Extension-->
            <div class="download">
              <p>Only admins can see this section.</p>
              
              <a href="../admin/index.php?p=main" class="folderbacklink" target="_blank"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Admin Dashboard/Management</a><br>
            </div>

            <br><br>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </div>
</div>