<div class="nav-content noselect">
  <div class="nav-small">
    <div class="nav-toggle-btn-container">
      <span class="nav-btn nav-btn-close" onclick="closenav()">&times;</span>
    </div>
  </div>
  <!--The main btns that can't be edited-->
  <div class="main-btns nav">
    <button class="nav-btn-container goal-style">
      <!--Close nav button-->
      <span style="cursor:pointer;" class="navbtn desktop-nav-button" onclick="closenav()"><i class="fas fa-arrow-left"></i></span>&nbsp;&nbsp;&nbsp;

      <!--Reload the page buttong-->
      <span style="cursor:pointer;" class="refresh" onclick="window.location.reload();"><i class="fas fa-sync-alt"></i></span>&nbsp;&nbsp;&nbsp;

      <!--Daily task goals-->
      <span class="goal"><i class="far fa-check-square"></i>&nbsp;&nbsp;
      <span class="complete-tasks" id="counter"><?php echo $cttoday; ?></span>/<?php echo $goal; ?></span>
    </button>
    
    <!--Inbox button-->
    <button class="nav-btn-container inbox-nav" onclick="inboxactive()" data-btn="inbox" style="margin-bottom:20px;">
      <div class="nav-row">
        <div class="nav-column"><img src="icons/nav-icons/Inbox.svg" alt="" class="nav-icon"><span class="nav-text">Inbox</span></div>
        <div class="nav-column nav-right"><span class="inboxtasksct nav-text taskct" id="inboxtasksct"></span></div>
      </div>
    </button>
    
    <!--Today button-->
    <button class="nav-btn-container today-nav" onclick="todayactive()" data-btn="today">
      <div class="nav-row">
        <div class="nav-column"><img src="icons/nav-icons/Today.svg" alt="" class="nav-icon"><span class="nav-text">Today</span></div>
        <div class="nav-column nav-right"><span class="todaytaskct nav-text taskct" id="todaytaskct"></span></div>
      </div>
    </button>
    
    <!--Planning button-->
    <button class="nav-btn-container planning-nav active" onclick="planningactive()" data-btn="planning">
      <div class="nav-row">
        <div class="nav-column"><img src="icons/nav-icons/Calendar.svg" alt="" class="nav-icon"><span class="nav-text">Upcoming</span></div>
        <div class="nav-column nav-right"><span class="planningtasksct nav-text taskct" id="planningtasksct"></span></div>
      </div>
    </button>
    
    <!--Links button-->
    <button class="nav-btn-container links-nav" onclick="linksactive()" data-btn="links">
      <div class="nav-row">
        <div class="nav-column"><img src="icons/nav-icons/Links.svg" alt="" class="nav-icon"><span class="nav-text">Links</span></div>
        <div class="nav-column nav-right"><span class="linkstaskct nav-text taskct" id="linksct"></span></div>
      </div>
    </button>
    
    <?php if($logpageen=='true'): ?>
    <!--Logbook button-->
    <button class="nav-btn-container log-nav" onclick="logactive()" data-btn="log">
      <img src="icons/nav-icons/Log.svg" alt="" class="nav-icon"><span class="nav-text">Logbook</span>
    </button>
    <?php endif; ?>
    
    <!--Stats button-->
    <button class="nav-btn-container stats-nav" onclick="statsactive()" data-btn="stats">
      <img src="icons/nav-icons/Stats.svg" alt="" class="nav-icon"><span class="nav-text">Stats</span>
    </button>
    
    <!--Alerts button-->
    <!--<button class="nav-btn-container alerts-nav" onclick="alertsactive()" data-btn="alerts">
      <img src="icons/nav-icons/Alerts-NoGradient.svg" alt="" class="nav-icon"><span class="nav-text">Alerts</span>
    </button>-->
  </div>

  <div class="nav-continue">
    <p class="label" id="folders-toggle"><!--Open Folders--><span class="folders-collapse">Folders <span class="toggle-float"><i class="fas fa-chevron-down"></i></span></span><!--Open Folders--><span class="folders-expand">Folders <span class="toggle-float"><i class="fas fa-chevron-right"></i></span></span></p>

    <div class="folder-show-ctrl">
      <!--Folder btns-->
      <div class="folder-btns">
        <!--Personal Folders-->
        <?php foreach($folder as $item): ?>
          <?php include('dynamic/folder-from-server.php'); ?>
        <?php endforeach; ?>

        <p class="label">Shared Folders:</p>
        <!--Shared Folders-->
        <?php foreach($sharedfolders as $item): ?>
          <?php include('dynamic/folder-from-server.php'); ?>
        <?php endforeach; ?>
      </div>

      <!--Add folder form-->
      <form method="POST" class="folder-add-form">
        <input type="text" class="form-control" name="folder" placeholder="Add folder" id="folder-input">
      </form>
    </div>
  </div>

  <!--Nav bottom-->
  <div class="nav-continue bottom">
    <!--Line on top of the bottom icons-->
    <hr style="opacity:0.1;color:grey;">

    <!--Folder add button-->
    <button class="nav-btn-container folder-add-btn" onclick="folderaddopen()">
      <span class="nav-text-bottom"><i class="fas fa-plus"></i>&nbsp;&nbsp;<span class="nav-text-bottom">Add Folder</span></span>
    </bottom> 

    <!--Settings btn-->
    <button class="nav-btn-container settings-btn" onclick="settingsactive()" data-btn="settings">
      <span class="nav-text-bottom"><i class="fas fa-sliders-h"></i>&nbsp;<span class="nav-text-bottom">Settings</span></span>
    </button>
  </div>
</div>