<?php
  // Gets the init file
  require('scripts/init.php');

  // Gets the document that gets everything from the db
  // For the insight page
  include('dynamic/get-items-from-db.php');
  
  $inboxitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
  $inboxitemsget->execute([
    'account' => $account,
    'date' => 'inbox'
  ]);
  $inboxitems = $inboxitemsget->rowCount() ? $inboxitemsget : [];

  $todayspecialitemsget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `date` = :date ORDER BY `priority` ASC");
  $todayspecialitemsget->execute([
    'account' => $account,
    'date' => $today
  ]);
  $todayspecialitems = $todayspecialitemsget->rowCount() ? $todayspecialitemsget : [];

  $foldersget = $db->prepare("SELECT * FROM `taskable_folders` WHERE `account` = :account");
  $foldersget->execute([
    'account' => $account
  ]);
  $folderitemslist = $foldersget->rowCount() ? $foldersget : [];

  $todaycdate = date('Y-m-d', strtotime('+0 day'));
  $dby = "SELECT * FROM `taskable_tasks` WHERE `completed` = 'true' AND `cdate` = '$todaycdate'";
  $connStatusy = $conn->query($dby);
  $cdatedone = mysqli_num_rows($connStatusy);
  
  //$titlename = ' - Next 31 Days';

  // Gets the daily goal
  $dailygoalget = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");

  $dailygoalget->execute([
    'username' => $account
    ]);

  $dailygoal = $dailygoalget->rowCount() ? $dailygoalget : []; 

  foreach($dailygoal as $item){
    $goal = $item['taskcompletegoal'];
  }

  
  // Gets folder id for the folder divs
  $folderdivget = $db->prepare("SELECT * FROM `taskable_folders` WHERE `account` = :account");
  $folderdivget->execute([
    'account' => $account
    ]);
  $folderdiv = $folderdivget->rowCount() ? $folderdivget : [];

  $verifyget = $db->prepare("SELECT * FROM passwordlogin WHERE username = :username");
  $verifyget->execute([
    'username' => $account
  ]);
  $verify = $verifyget->rowCount() ? $verifyget : []; 
  foreach($verify as $item){
    $verifystate = $item['verified'];
  }

  include('scripts/promo/end.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    // Calls all of the header elements
    include('dynamic/header.php');
    include('dynamic/modal.php');
    ?>
  </head>
  <body onload="currentPage()">
    <!--NAV-->
    <!--<div class="nav-container" id="nav-container">
      <div class="nav-display-none"><br></div>
      <?php //include('dynamic/one-page/nav.php'); ?>
      <div class="nav-display-none"><br></div>
    </div>-->

    <!--Remove to remove loader-->
    <!--Loader Box-->
    <div class="loader" id="loader">
      <img src="icons/check.v3.svg" alt="" class="loader_img">
      <div class="center">
        <!--<div class="loadercircle"></div>-->
        <!--<br><br><br>
        <img src="icons/loader-icons/spinner.gif" alt="" class="spinner">-->
      </div>
    </div>

    <div class="page-row">
      <div class="page-column page-nav">
        <?php include('dynamic/one-page/nav-content.php'); ?>
      </div>
      <div class="page-column page-content">
        <!--Nav button that only shows on smaller screens-->
        <div class="small-screen-show">
          <div class="nav-small-spacer">
            <span style="cursor:pointer;" class="navbutton" onclick="openNav()"><img class="logo" src="icons/menu.v2.svg"></span>
          </div>
        </div>

        <!--Insight/31 day view-->
        <div class="insight" id="insight">
          <br><br>
          <?php if($verifystate == 'false'):?>
            <div class="main" id="main">
              <div class="alert-style">
                <a class="red" href="scripts/verify/email.php?to=<?php echo $account; ?>&verifyid=<?php echo $account; ?>"><h3>Please Verify Your Email - Click Here</h3></a>
              </div>
            </div> 
          <?php endif; ?>
          
          <?php include('dynamic/one-page/insight.php'); ?>
          <br><br>
        </div>

        <!--Today view-->
        <div class="today" id="today">
          <br><br>
          <?php if($verifystate == 'false'):?>
            <div class="main" id="main">
              <div class="alert-style">
                <a class="red" href="scripts/verify/email.php?to=<?php echo $account; ?>&verifyid=<?php echo $account; ?>"><h3>Please Verify Your Email - Click Here</h3></a>
              </div>
            </div> 
          <?php endif; ?>
          
          <?php include('dynamic/one-page/today.php'); ?>
        </div>

        <!--Inbox view-->
        <div class="inbox" id="inbox">
          <br><br>
          <?php if($verifystate == 'false'):?>
            <div class="main" id="main">
              <div class="alert-style">
                <a class="red" href="scripts/verify/email.php?to=<?php echo $account; ?>&verifyid=<?php echo $account; ?>"><h3>Please Verify Your Email - Click Here</h3></a>
              </div>
            </div> 
          <?php endif; ?>
          
          <?php include('dynamic/one-page/inbox.php'); ?>
        </div>

        <!--Tomorrow View-->
        <div class="tomorrow" id="tomorrow">
          <br><br>
          <?php if($verifystate == 'false'):?>
            <div class="main" id="main">
              <div class="alert-style">
                <a class="red" href="scripts/verify/email.php?to=<?php echo $account; ?>&verifyid=<?php echo $account; ?>"><h3>Please Verify Your Email - Click Here</h3></a>
              </div>
            </div> 
          <?php endif; ?>
          
          <?php include('dynamic/one-page/tomorrow.php'); ?>
        </div>

        <!--Today Overview View-->
        <div class="overview" id="overview">
          <br><br>
          <?php if($verifystate == 'false'):?>
            <div class="main" id="main">
              <div class="alert-style">
                <a class="red" href="scripts/verify/email.php?to=<?php echo $account; ?>&verifyid=<?php echo $account; ?>"><h3>Please Verify Your Email - Click Here</h3></a>
              </div>
            </div> 
          <?php endif; ?>
          
          <?php include('dynamic/one-page/overview.php'); ?>
        </div>

        <!--Folders view-->
        <!--<div class="folder" id="folder">
          <?php //include('dynamic/one-page/folder.php'); ?>
        </div>-->

        <!--Folder expand view-->
        <!--<div class="folderexpand" id="folderexpand">
          <div id="folder-content-clear">
            <?php //include('dynamic/one-page/folderexpand.php'); ?>
          </div>
        </div>-->

        <?php include('dynamic/one-page/folder.php'); ?>
        <div class="folderaddto" id="folderaddto">
        </div>
    
      </div>
    </div>

  </body>
</html>
<?php
  // Calls the complete script and the style sheet
  include('scripts/complete-script.js');
  include('style/index.php');
  include('../include-all-user-pages.php'); 
?>
<script src="plugins/pulltorefresh.js/dist/pulltorefresh.js" type="text/javascript"></script>
<script>
  // Remove to remove loader  
  $('.page-row').css('display','none');
  setTimeout(() => { 
    document.getElementById("loader").style.display = 'none';
    $('.page-row').css('display','initial');
  }, 1000);

  // Gets the has from the url (IF SET) and selects the page on load
  function currentPage(){
    if(window.location.hash=='#today'){
      todayActive();
    }

    if(window.location.hash=='#insight'){
      insightActive();
    }

    if(window.location.hash=='#tomorrow'){
      tomorrowActive();
    }

    if(window.location.hash=='#inbox'){
      inboxActive();
    }

    if(window.location.hash=='#overview'){
      overviewActive();
    }
    
    if(window.location.hash.includes('fnb')){
      function getSecondPart(str) {
        return str.split('-')[1];
      }
      // use the function:
      var folderpath = getSecondPart(window.location.hash);

      $(" #insight ").css("display", "none");
      $(" #today ").css("display", "none");
      $(" #inbox ").css("display", "none");
      $(` .folderview `).css("display", "none");
      $(" #tomorrow ").css("display", "none");
      $(" #overview ").css("display", "none");
      
      document.title = "Tasks";

      location.hash = `fnb-${folderpath}`;

      document.getElementById(`todayactive`).classList.remove("active");
      document.getElementById(`insightactive`).classList.remove("active");
      document.getElementById(`inboxactive`).classList.remove("active");
      $(` .folderbutton `).removeClass( "active" );
      $(` #tomorrowactive `).removeClass( "active" );
      $(` #overviewactive `).removeClass( "active" );
      $(` .fnb-${folderpath} `).addClass( "active" );

      $(` #div-${folderpath} `).css("display", "initial");
    }
  }

  // This is what controls the current page
  // Sets everything but the landing page to a display none
  document.getElementById("today").style.display = 'none';
  document.getElementById("inbox").style.display = 'none';
  $('.tomorrow').css('display','none');
  $('.folderview').css('display','none');

  // Changes the current page to the today view
  function todayActive(){
    //closeNav();
    if ($(window).width() < 750) {
      closeNav();
    }

    location.hash = '#today';

    $(`.edit-container`).css('display', 'none');
    document.title = "Tasks - Today";

    document.getElementById(`todayactive`).classList.add("active");
    document.getElementById(`insightactive`).classList.remove("active");
    document.getElementById(`inboxactive`).classList.remove("active");
    $(` .folderbutton `).removeClass( "active" );
    $(` #tomorrowactive `).removeClass( "active" );
    $(` #overviewactive `).removeClass( "active" );

    $(" #insight ").css("display", "none");
    $(" #today ").css("display", "initial");
    $(" #inbox ").css("display", "none");
    $(" #tomorrow ").css("display", "none");
    $(` .folderview `).css("display", "none");
    $(" #overview ").css("display", "none");
    /* document.getElementById("insight").style.display = 'none';
    document.getElementById("today").style.display = 'initial';
    document.getElementById("inbox").style.display = 'none'; */
  }

  // Changes the current page to the insight
  function insightActive(){
    //closeNav();
    if ($(window).width() < 750) {
      closeNav();
    }

    $(`.edit-container`).css('display', 'none');
    document.title = "Tasks - Planning";

    location.hash = '#insight';

    document.getElementById(`todayactive`).classList.remove("active");
    document.getElementById(`insightactive`).classList.add("active");
    document.getElementById(`inboxactive`).classList.remove("active");
    $(` .folderbutton `).removeClass( "active" );
    $(` #tomorrowactive `).removeClass( "active" );
    $(` #overviewactive `).removeClass( "active" );

    $(" #insight ").css("display", "initial");
    $(" #today ").css("display", "none");
    $(" #inbox ").css("display", "none");
    $(" #tomorrow ").css("display", "none");
    $(` .folderview `).css("display", "none");
    $(" #overview ").css("display", "none");
    /*document.getElementById("insight").style.display = 'initial';
    document.getElementById("today").style.display = 'none';
    document.getElementById("inbox").style.display = 'none'; */
  }

  // Changes the current page to the inbox
  function inboxActive(){
    //closeNav();
    if ($(window).width() < 750) {
      closeNav();
    }
    
    $(`.edit-container`).css('display', 'none');
    document.title = "Tasks - Inbox";

    location.hash = '#inbox';

    document.getElementById(`todayactive`).classList.remove("active");
    document.getElementById(`insightactive`).classList.remove("active");
    document.getElementById(`inboxactive`).classList.add("active");
    $(` .folderbutton `).removeClass( "active" );
    $(` #tomorrowactive `).removeClass( "active" );
    $(` #overviewactive `).removeClass( "active" );

    $(" #insight ").css("display", "none");
    $(" #today ").css("display", "none");
    $(" #inbox ").css("display", "initial");
    $(" #tomorrow ").css("display", "none");
    $(` .folderview `).css("display", "none");
    $(" #overview ").css("display", "none");
    /*document.getElementById("insight").style.display = 'none';
    document.getElementById("today").style.display = 'none';
    document.getElementById("inbox").style.display = 'initial';*/
  }

  // Changes the current page to the tomorrow page
  function tomorrowActive(){
    //closeNav();
    if ($(window).width() < 750) {
      closeNav();
    }
    
    $(`.edit-container`).css('display', 'none');
    document.title = "Tasks - Tomorrow";

    location.hash = '#tomorrow';

    document.getElementById(`todayactive`).classList.remove("active");
    document.getElementById(`insightactive`).classList.remove("active");
    document.getElementById(`inboxactive`).classList.remove("active");
    $(` .folderbutton `).removeClass( "active" );
    $(` #tomorrowactive `).addClass( "active" );
    $(` #overviewactive `).removeClass( "active" );

    $(" #insight ").css("display", "none");
    $(" #today ").css("display", "none");
    $(" #inbox ").css("display", "none");
    $(" #tomorrow ").css("display", "initial");
    $(` .folderview `).css("display", "none");
    $(" #overview ").css("display", "none");
    /*document.getElementById("insight").style.display = 'none';
    document.getElementById("today").style.display = 'none';
    document.getElementById("inbox").style.display = 'initial';*/
  }

  // Gets the folder and appends to a container
  $(document).on('click', '.folderbutton', function(){
    // Gets the task id
    var id = $(this).data('id');

    // Shows the folder
    $(" #insight ").css("display", "none");
    $(" #today ").css("display", "none");
    $(" #inbox ").css("display", "none");
    $(` .folderview `).css("display", "none");
    $(" #tomorrow ").css("display", "none");
    $(" #overview ").css("display", "none");
    
    document.title = "Tasks";

    location.hash = `#fnb-${id}`;

    document.getElementById(`todayactive`).classList.remove("active");
    document.getElementById(`insightactive`).classList.remove("active");
    document.getElementById(`inboxactive`).classList.remove("active");
    $(` .folderbutton `).removeClass( "active" );
    $(` #tomorrowactive `).removeClass( "active" );
    $(` .fnb-${id} `).addClass( "active" );
    $(` #overviewactive `).removeClass( "active" );

    $(` #div-${id} `).css("display", "initial");
    if ($(window).width() < 750) {
      closeNav();
    }

    // Calls the document that marks task as done
    /*$.ajax({
      url: `scripts/del_task.php?task=${id}`,
      method:"POST",
      data:{id:id}
    })*/
  });

  // Changes the current page to the overview page
  function overviewActive(){
    //closeNav();
    if ($(window).width() < 750) {
      closeNav();
    }
    
    $(`.edit-container`).css('display', 'none');
    document.title = "Tasks - Overview";

    location.hash = '#overview';

    document.getElementById(`todayactive`).classList.remove("active");
    document.getElementById(`insightactive`).classList.remove("active");
    document.getElementById(`inboxactive`).classList.remove("active");
    $(` .folderbutton `).removeClass( "active" );
    $(` #tomorrowactive `).removeClass( "active" );
    $(` #overviewactive `).addClass( "active" );

    $(" #insight ").css("display", "none");
    $(" #today ").css("display", "none");
    $(" #inbox ").css("display", "none");
    $(" #tomorrow ").css("display", "none");
    $(` .folderview `).css("display", "none");
    $(" #overview ").css("display", "initial");
    /*document.getElementById("insight").style.display = 'none';
    document.getElementById("today").style.display = 'none';
    document.getElementById("inbox").style.display = 'initial';*/
  }

  // Pull to refresh function for the app/mobile 
  PullToRefresh.init({
    mainElement: 'body',
    onRefresh: function(){ window.location.reload(); }
  });

  // Page load script (tracking)
  window.addEventListener("load", myInit, true); function myInit(){
    $.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
      //console.log(data);
      //$("#track").html(data);
      $.ajax({
        url: `scripts/tracking/sendrequest.php?a=appload&cfdata=${data}`,
        method:"POST",
        data:$(this).serialize(),
      })
    })
  }; 
</script>


<!--Everything bwloe this is for the task completion and the edit boxes-->
<script> 
  // Updates task as the user types
  $(document).ready(function(){
    $('.task-input').keyup(function(){
      // Get the task id
      var textareaid = $(this).data('id');

      // Gets the content that the user is typing
      var content = document.getElementById(`input-${textareaid}`).innerHTML;
      
      $.ajax({
        // Send the request to the server
        url: `scripts/auto-update-task.php?content=${content}&id=${textareaid}`,
        method:"POST",
        data:$(this).serialize(),
      })
    });

    
    // Closes all of the edit containers when the page loads
    $('.edit-container').css('display', 'none');

    // Opens the edit container when the edit button is clicked
    $(document).on('click', '.edit-button', function(){
      // Gets the container id from the edit button
      var id = $(this).data('id');

      // Closes any other open edit containers
      $(`.edit-container`).css('display', 'none');
      // Opens the current one being clicked on
      $(`.edit-container-${id}`).css('display', 'initial');
    });

    // Closes all of the containers when the exit (x) button is pressed
    $(document).on('click', '.exit', function(){
      $(`.edit-container`).css('display', 'none');
    });

    // Changing the priority of the items
      // P1
      $(document).on('click', '.pf-1', function(){
        // Gets the task id
        var id = $(this).data('id');

        // Clears past alerts if there are any 
        document.getElementById(`alert-${id}`).innerHTML = "";

        // Put alerts on the page with the tag that it was changed to
        $( `#alert-${id}` ).append( `<span class="green">Priority Updated! P1</span>` );

        // Updates the class name so the color changes
        document.getElementById(`update-${id}`).className = `p1`;

        // Calls the document that marks task as done
        $.ajax({
          url: `scripts/priority.php?taskid=${id}&id=p1`,
          method:"POST",
          data:{id:id},
          success:function(data)
          {
          }
        })
      });
      
      // P2
      $(document).on('click', '.pf-2', function(){
        // Gets the task id
        var id = $(this).data('id');

        // Clears past alerts if there are any 
        document.getElementById(`alert-${id}`).innerHTML = "";

        // Put alerts on the page with the tag that it was changed to
        $( `#alert-${id}` ).append( `<span class="green">Priority Updated! P2</span>` );

        // Updates the class name so the color changes
        document.getElementById(`update-${id}`).className = `p2`;
        // Calls the document that marks task as done
        $.ajax({
          url: `scripts/priority.php?taskid=${id}&id=p2`,
          method:"POST",
          data:{id:id},
          success:function(data)
          {
          }
        })
      });
      
      // P3
      $(document).on('click', '.pf-3', function(){
        // Gets the task id
        var id = $(this).data('id');

        // Clears past alerts if there are any 
        document.getElementById(`alert-${id}`).innerHTML = "";

        // Put alerts on the page with the tag that it was changed to
        $( `#alert-${id}` ).append( `<span class="green">Priority Updated! P3</span>` );

        // Updates the class name so the color changes
        document.getElementById(`update-${id}`).className = `p3`;

        // Calls the document that marks task as done
        $.ajax({
          url: `scripts/priority.php?taskid=${id}&id=p3`,
          method:"POST",
          data:{id:id},
          success:function(data)
          {
          }
        })
      });

    // Date edit edit box
    $(document).on('submit', '.date-form', function(event){
      // Gets the task id from the date edit box
      var editaskid = $(this).data('id');

      // Stops the form from refreshing the page
      event.preventDefault();
      // Gets the date and other content from the box
      var content = document.getElementById(`date-box-${editaskid}`).value;

      // Sends everything to the server
      $.ajax({
        url: `scripts/edit_date.php?date=${content}&id=${editaskid}`,
        method:"POST",
        data:$(this).serialize(),
      })

      // Reloads the page so the changes take effect
      location.reload();
    });

    // Updates the notes from the edit box
    $(document).on('submit', '.edit-box-update-notes', function(event){
      // Gets the task id from the note container
      var noteboxid = $(this).data('id');

      // Stops the form from refreshing the page
      event.preventDefault();

      // Sends everything to the add_task page for it to be added to the db
      $('#submit').attr('disabled', 'disabled');
      
      // Send everything to the server
      $.ajax({
        url: `scripts/edit_notes.php?task=${noteboxid}`,
        method:"POST",
        data:$(this).serialize(),
      })
    });
  });

  $(document).ready(function(){
  
    // Completes the task
    $(document).on('click', '.task-complete', function(){
      // Gets the hash when the task complete button is clicked
      var completehash = window.location.hash;

      // Gets the task id from the item that was clcked
      var id = $(this).data('id');
      
      // Removes the item from the page/list
      $('.task-outer-'+id).css('display', 'none');

      // Calls the document that marks task as done
      $.ajax({
        url: 'scripts/complete_task.php',
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          // Replces the hash after the URL has been cleared
          location.hash = `${completehash}`;
        }
      })
    });

    // Deletes the task
    $(document).on('click', '.deltask-box', function(){
      // Gets the task id
      var id = $(this).data('id');
      
      // Removes the item from the list
      $('.task-outer-'+id).css('display', 'none');

      // Calls the document that marks task as done
      $.ajax({
        url: `scripts/del_task.php?task=${id}`,
        method:"POST",
        data:{id:id},
        success:function(data)
        {
          //$('#list-group-item-'+id).css('display', 'none');
          //$('#list-group-dropdown-'+id).css('display', 'none');
        }
      })
    });

    // Handles deleting of the folder
    $(document).on('click', '.trash-del', function(){
      // Gets the task id
      var id = $(this).data('id');
        
      // Removes the item from the list
      $('.div-'+id).css('display', 'none');

      $(" #insight ").css("display", "initial");
      $(" #today ").css("display", "none");
      $(" #inbox ").css("display", "none");
      $(` .folderview `).css("display", "none");

      $(' .fni-'+id ).css("display","none");

      // Calls the document that marks task as done
      $.ajax({
        url: `scripts/del_folder.php?folderid=${id}`,
        method:"POST",
        data:{id:id},
      })
    });


    // Handles adding of the folder tasks
    $(document).on('submit', '#folderform', function(event){
      // Gets the task id
      var id = $(this).data('id');

      // Stops the form from refreshing the page
      event.preventDefault();

      // Gemerates a random taskid code
      function maketfid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
      } 
      //console.log(makeid(64));
      var taskid = maketfid(64);

      // Adds everything to the div
      var taskvar = document.getElementById(`fi-${id}`).value;
      $( `.f-${id}` ).append( `
        <?php include('dynamic/add-task-list.php'); ?>
      ` );
                  
      // Sends everything to the add_task page for it to be added to the db
      $('#submit').attr('disabled', 'disabled');
      $.ajax({
        url: `scripts/add_folder_task.php?taskid=${taskid}&folder=${id}`,
        method:"POST",
        data:$(this).serialize(),
      })

      // Clears the form
      $(`.ff-${id}`)[0].reset();
    });

    // Opens the folder alert box
    $(document).on('click', '.fa-del-box-open', function(){
      // Gets the task id
      var id = $(this).data('id');

      $(`.fa-${id}`).removeClass("alert-fa-none");
    });

    // Opens the folder alert box
    $(document).on('click', '.fa-close', function(){
      // Gets the task id
      var id = $(this).data('id');
      
      $(`.fa-${id}`).addClass("alert-fa-none");
    });

    // Edits the name of a folder
    $('.foldername-edit').keyup(function(){
      // Get the task id
      var fnid = $(this).data('id');

      // Gets the content that the user is typing
      var content = document.getElementById(`fn-${fnid}`).innerHTML;

      // Update the text in the nav button
      document.getElementById(`fnavb-${fnid}`).innerHTML = content;

      $.ajax({
        // Send the request to the server
        url: `scripts/folder_name_update.php?name=${content}&folderid=${fnid}`,
        method:"POST",
        data:$(this).serialize(),
      })
    });

    // Edits the content of the notes
    $(document).on('click', '.folder-notes-save', function(){
      // Get the task id
      var foldernotes = $(this).data('id');

      // Gets the content that the user is typing
      var content = document.getElementById(`folder-notes-${foldernotes}`).innerHTML;

      $.ajax({
        // Send the request to the server
        url: `scripts/folder_notes_update.php?name=${content}&folderid=${foldernotes}`,
        method:"POST",
        data:$(this).serialize(),
      })
    });

    // Adds the sub tasks
    $(document).on('submit', '.subtasks-form', function(event){
      // Get the form id
      var id = $(this).data('id');

      // Stops the form from refreshing the page
      event.preventDefault();

      // Gemerates a random taskid code
      function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
      }
      //console.log(makeid(64));
      var taskid = makeid(64);

      // Adds everything to the div
      var taskvar = document.getElementById(`sti-${id}`).value;
      $( `.stl-${id}` ).append( `
      <?php include('dynamic/add-subtask.php'); ?>
      ` );
                
      // Sends everything to the add_task page for it to be added to the db
      $('#submit').attr('disabled', 'disabled');
      $.ajax({
        url: `scripts/add_subtask.php?taskid=${taskid}&ptid=${id}`,
        method:"POST",
        data:$(this).serialize(),
      })

      // Clears the form
      $('.subtasks-form')[0].reset();
    });

    // Adds complete styles to the subtask when clicked
    $(document).on('click', '.sub-task-complete-button', function(){
      // Get the form id
      var id = $(this).data('id');

      // Stops the form from refreshing the page
      event.preventDefault();

      $(`#input-${id}`).addClass('sub-completed-text');
      $(`#update-${id}`).addClass('sub-completed');
      $(`#update-${id}`).removeClass('p3');
    });
  });
</script>