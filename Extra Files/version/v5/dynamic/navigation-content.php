<div class="nav-content">
  <div class="nav-small">
    <div class="nav-toggle-btn-container">
      <span class="nav-btn nav-btn-close" onclick="closenav()">&times;</span>
    </div>
  </div>
  <!--The main btns that can't be edited-->
  <div class="main-btns nav">
    <!--Task complete goal-->
    <button class="nav-btn-container goal-style">
    <span class="navbtn desktop-nav-button" onclick="closenav()"><i class="fas fa-arrow-left"></i></span>&nbsp;&nbsp;&nbsp;<span style="cursor:pointer;" class="refresh" onclick="window.location.reload();"><i class="fas fa-sync-alt"></i></span>&nbsp;&nbsp;&nbsp;<span class="goal"><i class="far fa-check-square"></i>&nbsp;&nbsp;<span class="complete-tasks" id="counter"><?php echo $cttoday; ?></span>/<?php echo $goal; ?></span>
    </button>
    <!--Today button-->
    <!--<button class="nav-btn-container today-nav" onclick="todayactive()" data-btn="today">
      <img src="icons/nav-icons/Today.svg" alt="" class="nav-icon"><span class="nav-text">Today</span>
    </button>-->
    
    <!--Inbox button-->
    <button class="nav-btn-container inbox-nav" onclick="inboxactive()" data-btn="inbox">
      <div class="nav-row">
        <div class="nav-column"><img src="icons/nav-icons/Inbox.svg" alt="" class="nav-icon"><span class="nav-text">Inbox</span></div>
        <div class="nav-column nav-right"><span class="inboxtasksct nav-text taskct" id="inboxtasksct"></span></div>
      </div>
    </button>
    
    <!--Planning button-->
    <button class="nav-btn-container planning-nav active" onclick="planningactive()" data-btn="planning">
      <div class="nav-row">
        <div class="nav-column"><img src="icons/nav-icons/Calendar.svg" alt="" class="nav-icon"><span class="nav-text">Planning</span></div>
        <div class="nav-column nav-right"><span class="planningtasksct nav-text taskct" id="planningtasksct"></span></div>
      </div>
    </button>
    
    <!--Inbox button-->
    <button class="nav-btn-container log-nav" onclick="logactive()" data-btn="log">
      <img src="icons/nav-icons/Log.svg" alt="" class="nav-icon"><span class="nav-text">Logbook</span>
    </button>
    
    <!--Stats button-->
    <button class="nav-btn-container stats-nav" onclick="statsactive()" data-btn="stats">
      <img src="icons/nav-icons/Stats.svg" alt="" class="nav-icon"><span class="nav-text">Stats</span>
    </button>
  </div>

  <div class="nav-continue">
    <span id="nav-alert"></span>
    <p class="label">Folders</p>
    <!--Folder btns-->
    <div class="folder-btns">
      <?php foreach($folder as $item): ?>
        <?php include('dynamic/folder-from-server.php'); ?>
      <?php endforeach; ?>
    </div>

    <!--Add folder form-->
    <form method="POST" class="folder-add-form">
      <input type="text" class="form-control" name="folder" placeholder="Add folder" id="folder-input">
    </form>
  </div>

  <div class="nav-continue bottom">
    <hr style="opacity:0.1;color:grey;">
    <!--Folder add button-->
    <button class="nav-btn-container folder-add-btn" onclick="folderaddopen()">
      <span class="nav-text-bottom"><img src="icons/nav-icons/Add Folder.svg" alt="" class="folder-add-icon"> <span class="nav-text-bottom">Add Folder</span></span>
    </bottom> 

    <!--Settings btn-->
    <button class="nav-btn-container settings-btn" onclick="settingsactive()" data-btn="settings">
      <span class="nav-text-bottom"><i class="fas fa-sliders-h"></i> <span class="nav-text-bottom">Settings</span></span>
    </button>
  </div>
</div>