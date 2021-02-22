<?php
        $preminumgetnav = $db->prepare("SELECT * FROM `passwordlogin` WHERE `username` = :account");
        $preminumgetnav->execute([
          'account' => $account
          ]);
        $preminumnav = $preminumgetnav->rowCount() ? $preminumgetnav : [];

        $foldersget = $db->prepare("SELECT * FROM `taskable_folders` WHERE `account` = :account");
        $foldersget->execute([
          'account' => $account
          ]);
        $folders = $foldersget->rowCount() ? $foldersget : [];

        if($theme=='dark'){
          $navcolor = "#fff";
        }else{
          $navcolor = "#333";
        }
      ?>
      <!--Nav-->
      <div class="navrow">
        <!--This is the container that will add padding to the top for the mobile app -->
        <div class="navpadding"></div>
        
        <div class="navcolumn">
          <span style="cursor:pointer;" class="navbutton" onclick="openNav()"><img class="logo" src="icons/menu.v2.svg"></span>
        </div>
        <div class="navcolumn navright nav-dim">
          <input type="text" id="todaycompletect" value="<?php echo $cdatedone; ?>" readonly/><span>/<?php echo $goal; ?></span>
        </div>
      </div>

      <div class="nav" id="nav">
        <div id="mySidenav" class="sidenav">

          <!--This is the container that will add padding to the top for the mobile app -->
          <!--<div class="navpadding"></div>-->
          
          <a href="javascript:void(0)" class="closebtn closepadding" onclick="closeNav()">&times;</a>

          <!--First nav-->
          <div class="navone" id="navone">
            <div class="navitem">
              <div id="active-change-today" class="active">
                <!--Today-->
                <button onclick="todayActive()" id="todayactive" class=""><?php include('icons/nav/today.php'); ?>&nbsp;&nbsp;<span class="navtext">Today</span></button>
              </div>
            </div>

            <div class="navitem">
              <div id="active-change-planning" class="active">
                <!--Weekly Tasks-->
                <button onclick="insightActive()" id="insightactive" class="active"><?php include('icons/nav/calendar.php'); ?>&nbsp;&nbsp;<span class="navtext">Planning</span></button>
              </div>
            </div>

            <div class="navitem">
              <div id="active-change-inbox" class="active">
                <!--Other Tasks-->
                <button onclick="inboxActive()" id="inboxactive" class=""><?php include('icons/nav/inbox.php'); ?>&nbsp;&nbsp;<span class="navtext">Inbox</span></button>
              </div>
            </div>

            <br><br>
            
            <!-- Folder listing -->
            <div class="navitem">
              <span class="navtext projects-heading">Folders<span class="folder-title-right"><?php include('icons/nav/add_folder.php'); ?></span></span>
            </div>
            <?php foreach($folders as $item): ?>
              <?php $decryptedfoldername = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv); ?>
              <div class="folder-nav-item navitem fni-<?php echo $item['folderid']; ?>">
                <div>
                  <button id="folder" class="folderbutton fnb-<?php echo $item['folderid']; ?>" data-id="<?php echo $item['folderid']; ?>"><?php include('icons/nav/folder.php'); ?>&nbsp;&nbsp;&nbsp;<span class="folder-button-text foldernav-<?php echo $item['folderid']; ?>" id="fnavb-<?php echo $item['folderid']; ?>" data-id="<?php echo $item['folderid']; ?>"><?php echo $decryptedfoldername; ?></span></button>
                </div>
              </div>
            <?php endforeach; ?>
            <div id="folderlinkadd" class="folderlinkadd"></div>
            <div class="folder-nav-item folder-add-container navitem">
              <div class="folder-add-container-inner">
                <form id="folderadd" class="folderadd">
                  <input type="text" name="folder" class="fi form-control" id="fi" placeholder="Add a Folder...">
                </form>
              </div>
            </div>
            <script>
              $(document).ready(function(){
                $('.folder-add-container-inner').css('display','none');
                $(document).on('click', '.folder-title-right', function(){
                  $('.folder-add-container-inner').css('display','initial');
                });

                $(document).on('submit', '#folderadd', function(event){
                  // Stops the form from refreshing the page
                  event.preventDefault();

                  // Gemerates a random taskid code
                  function makefid(length) {
                    var result           = '';
                    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    var charactersLength = characters.length;
                    for ( var i = 0; i < length; i++ ) {
                      result += characters.charAt(Math.floor(Math.random() * charactersLength));
                    }
                    return result;
                  }
                  //console.log(makeid(64));
                  var folderid = makefid(64);

                  // Adds everything to the div
                  var foldervar = document.getElementById("fi").value;
                  /*$( ".folderaddto" ).append( `
                    <?php //include('dynamic/one-page/folder-add.php'); ?>
                  ` );
                  $( ".folderlinkadd" ).append(`
                    <div class="navitem">
                      <div>
                        <!--Other Tasks-->
                        <button id="folder" class="folderbutton ${folderid}" data-id="${folderid}"><span class="navtext" data-id="${folderid}">${foldervar}</span></button>
                      </div>
                    </div>
                  `);*/
                  location.reload();
                    
                  // Sends everything to the add_task page for it to be added to the db
                  $.ajax({
                    url: `scripts/add_folder.php?folderid=${folderid}`,
                    method:"POST",
                    data:$(this).serialize(),
                  })

                  // Clears the form
                  $('#folderadd')[0].reset();
                });
              });
            </script>

            <!--<div class="navitem">
              <button onclick="folderActive()"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="folder" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-folder fa-w-16 fa-3x"><path fill="#ea00ff" d="M194.74 96l54.63 54.63c6 6 14.14 9.37 22.63 9.37h192c8.84 0 16 7.16 16 16v224c0 8.84-7.16 16-16 16H48c-8.84 0-16-7.16-16-16V112c0-8.84 7.16-16 16-16h146.74M48 64C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48H272l-54.63-54.63c-6-6-14.14-9.37-22.63-9.37H48z" class=""></path></svg>&nbsp;&nbsp;<span class="navtext">Folders</span></button>
            </div>-->
            
            <br><br>

            <div class="nav_bottom">
              <!--Account-->
              <a target="_blank" class="navalign secondnavshow"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-cog fa-w-16 fa-5x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M482.696 299.276l-32.61-18.827a195.168 195.168 0 0 0 0-48.899l32.61-18.827c9.576-5.528 14.195-16.902 11.046-27.501-11.214-37.749-31.175-71.728-57.535-99.595-7.634-8.07-19.817-9.836-29.437-4.282l-32.562 18.798a194.125 194.125 0 0 0-42.339-24.48V38.049c0-11.13-7.652-20.804-18.484-23.367-37.644-8.909-77.118-8.91-114.77 0-10.831 2.563-18.484 12.236-18.484 23.367v37.614a194.101 194.101 0 0 0-42.339 24.48L105.23 81.345c-9.621-5.554-21.804-3.788-29.437 4.282-26.36 27.867-46.321 61.847-57.535 99.595-3.149 10.599 1.47 21.972 11.046 27.501l32.61 18.827a195.168 195.168 0 0 0 0 48.899l-32.61 18.827c-9.576 5.528-14.195 16.902-11.046 27.501 11.214 37.748 31.175 71.728 57.535 99.595 7.634 8.07 19.817 9.836 29.437 4.283l32.562-18.798a194.08 194.08 0 0 0 42.339 24.479v37.614c0 11.13 7.652 20.804 18.484 23.367 37.645 8.909 77.118 8.91 114.77 0 10.831-2.563 18.484-12.236 18.484-23.367v-37.614a194.138 194.138 0 0 0 42.339-24.479l32.562 18.798c9.62 5.554 21.803 3.788 29.437-4.283 26.36-27.867 46.321-61.847 57.535-99.595 3.149-10.599-1.47-21.972-11.046-27.501zm-65.479 100.461l-46.309-26.74c-26.988 23.071-36.559 28.876-71.039 41.059v53.479a217.145 217.145 0 0 1-87.738 0v-53.479c-33.621-11.879-43.355-17.395-71.039-41.059l-46.309 26.74c-19.71-22.09-34.689-47.989-43.929-75.958l46.329-26.74c-6.535-35.417-6.538-46.644 0-82.079l-46.329-26.74c9.24-27.969 24.22-53.869 43.929-75.969l46.309 26.76c27.377-23.434 37.063-29.065 71.039-41.069V44.464a216.79 216.79 0 0 1 87.738 0v53.479c33.978 12.005 43.665 17.637 71.039 41.069l46.309-26.76c19.709 22.099 34.689 47.999 43.929 75.969l-46.329 26.74c6.536 35.426 6.538 46.644 0 82.079l46.329 26.74c-9.24 27.968-24.219 53.868-43.929 75.957zM256 160c-52.935 0-96 43.065-96 96s43.065 96 96 96 96-43.065 96-96-43.065-96-96-96zm0 160c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64z" class=""></path></svg><!--Account--></a>
            </div>
            <!--<a href="#"><?php //echo $account;?></a>-->
          </div>





















          <!--Second inner nav-->
          <div class="navtwo" id="navtwo">
            <a target="_blank" class="navalign closesecondnav"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" class="svg-inline--fa fa-arrow-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!--Account--></a>
            
            

            <br><br>


            
            <!--Settings-->
            <a href="settings.php" class=""><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-cog fa-w-16 fa-5x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M482.696 299.276l-32.61-18.827a195.168 195.168 0 0 0 0-48.899l32.61-18.827c9.576-5.528 14.195-16.902 11.046-27.501-11.214-37.749-31.175-71.728-57.535-99.595-7.634-8.07-19.817-9.836-29.437-4.282l-32.562 18.798a194.125 194.125 0 0 0-42.339-24.48V38.049c0-11.13-7.652-20.804-18.484-23.367-37.644-8.909-77.118-8.91-114.77 0-10.831 2.563-18.484 12.236-18.484 23.367v37.614a194.101 194.101 0 0 0-42.339 24.48L105.23 81.345c-9.621-5.554-21.804-3.788-29.437 4.282-26.36 27.867-46.321 61.847-57.535 99.595-3.149 10.599 1.47 21.972 11.046 27.501l32.61 18.827a195.168 195.168 0 0 0 0 48.899l-32.61 18.827c-9.576 5.528-14.195 16.902-11.046 27.501 11.214 37.748 31.175 71.728 57.535 99.595 7.634 8.07 19.817 9.836 29.437 4.283l32.562-18.798a194.08 194.08 0 0 0 42.339 24.479v37.614c0 11.13 7.652 20.804 18.484 23.367 37.645 8.909 77.118 8.91 114.77 0 10.831-2.563 18.484-12.236 18.484-23.367v-37.614a194.138 194.138 0 0 0 42.339-24.479l32.562 18.798c9.62 5.554 21.803 3.788 29.437-4.283 26.36-27.867 46.321-61.847 57.535-99.595 3.149-10.599-1.47-21.972-11.046-27.501zm-65.479 100.461l-46.309-26.74c-26.988 23.071-36.559 28.876-71.039 41.059v53.479a217.145 217.145 0 0 1-87.738 0v-53.479c-33.621-11.879-43.355-17.395-71.039-41.059l-46.309 26.74c-19.71-22.09-34.689-47.989-43.929-75.958l46.329-26.74c-6.535-35.417-6.538-46.644 0-82.079l-46.329-26.74c9.24-27.969 24.22-53.869 43.929-75.969l46.309 26.76c27.377-23.434 37.063-29.065 71.039-41.069V44.464a216.79 216.79 0 0 1 87.738 0v53.479c33.978 12.005 43.665 17.637 71.039 41.069l46.309-26.76c19.709 22.099 34.689 47.999 43.929 75.969l-46.329 26.74c6.536 35.426 6.538 46.644 0 82.079l46.329 26.74c-9.24 27.968-24.219 53.868-43.929 75.957zM256 160c-52.935 0-96 43.065-96 96s43.065 96 96 96 96-43.065 96-96-43.065-96-96-96zm0 160c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64z" class=""></path></svg>&nbsp;&nbsp;&nbsp;<span class="navtext">Settings</span></a>

            <br><br>

            <a href="history.php" class=""><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="history" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-history fa-w-16 fa-2x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M20 24h10c6.627 0 12 5.373 12 12v94.625C85.196 57.047 165.239 7.715 256.793 8.001 393.18 8.428 504.213 120.009 504 256.396 503.786 393.181 392.834 504 256 504c-63.926 0-122.202-24.187-166.178-63.908-5.113-4.618-5.354-12.561-.482-17.433l7.069-7.069c4.503-4.503 11.749-4.714 16.482-.454C150.782 449.238 200.935 470 256 470c117.744 0 214-95.331 214-214 0-117.744-95.331-214-214-214-82.862 0-154.737 47.077-190.289 116H164c6.627 0 12 5.373 12 12v10c0 6.627-5.373 12-12 12H20c-6.627 0-12-5.373-12-12V36c0-6.627 5.373-12 12-12zm321.647 315.235l4.706-6.47c3.898-5.36 2.713-12.865-2.647-16.763L272 263.853V116c0-6.627-5.373-12-12-12h-8c-6.627 0-12 5.373-12 12v164.147l84.884 61.734c5.36 3.899 12.865 2.714 16.763-2.646z" class=""></path></svg>&nbsp;&nbsp;&nbsp;<span class="navtext">History</span></a>

            <br><br>

            <a href="activity.php?y=<?php echo date("Y",strtotime("-0 year")); ?>" class=""><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chart-line" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-chart-line fa-w-16 fa-3x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M504 416H32V72c0-4.42-3.58-8-8-8H8c-4.42 0-8 3.58-8 8v360c0 8.84 7.16 16 16 16h488c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zM98.34 263.03c-3.12 3.12-3.12 8.19 0 11.31l11.31 11.31c3.12 3.12 8.19 3.12 11.31 0l72.69-72.01 84.69 84.69c6.25 6.25 16.38 6.25 22.63 0l93.53-93.53 44.04 44.04c4.95 4.95 11.03 7.16 17 7.16 12.48 0 24.46-9.7 24.46-24.34V112.19c0-8.94-7.25-16.19-16.19-16.19H344.34c-21.64 0-32.47 26.16-17.17 41.46l44.71 44.71-82.22 82.22-84.63-84.63c-6.23-6.23-16.32-6.25-22.57-.05l-84.12 83.32zM362.96 128H448v85.04L362.96 128z" class=""></path></svg>&nbsp;&nbsp;&nbsp;<span class="navtext">Productivity Habbits</span></a>

            <?php 
              if($admin == 'true'){
                echo "<br><br>";
                echo "<a href=\"admin\" class=\"\"><svg class=\"navsizing\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fal\" data-icon=\"users-cog\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 640 512\" class=\"svg-inline--fa fa-users-cog fa-w-20 fa-2x\"><path fill=\"currentcolor\" d=\"M287.4 250.6c2.9-10.4 6.5-20.4 10.9-30-33.6-9.5-58.4-40.1-58.4-76.7 0-44.1 35.9-80 80-80 36.6 0 67.1 24.8 76.7 58.4 9.6-4.4 19.6-8.1 30-10.9C412.6 65.6 370.4 32 320 32c-61.9 0-112 50.1-112 112 0 50.4 33.6 92.6 79.4 106.6zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm61.1 172.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4zM176 448c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 14.3 0 18.8 2.4 40.7 7.2-.2-3.8-1.4-13.4.6-32.6-16.3-4.3-26.4-6.6-41.3-6.6-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h209c-16-8.6-30.6-19.5-43.5-32H176zm304-208.5c-35.6 0-64.5 29-64.5 64.5s28.9 64.5 64.5 64.5 64.5-29 64.5-64.5-28.9-64.5-64.5-64.5zm0 97c-17.9 0-32.5-14.6-32.5-32.5s14.6-32.5 32.5-32.5 32.5 14.6 32.5 32.5-14.6 32.5-32.5 32.5zm148.3-10.2l-16.5-9.5c.8-8.5.8-17.1 0-25.6l16.6-9.5c9.5-5.5 13.8-16.7 10.5-27-7.2-23.4-19.9-45.4-36.7-63.5-7.4-8.1-19.3-9.9-28.8-4.4l-16.5 9.5c-7-5-14.4-9.3-22.2-12.8v-19c0-11-7.5-20.3-18.2-22.7-23.9-5.4-49.3-5.4-73.3 0-10.7 2.4-18.2 11.8-18.2 22.7v19c-7.8 3.5-15.3 7.8-22.2 12.8l-16.5-9.5c-9.5-5.5-21.3-3.7-28.7 4.4-16.8 18.1-29.4 40.1-36.7 63.4-3.3 10.4 1.2 21.8 10.6 27.2l16.5 9.5c-.8 8.5-.8 17.1 0 25.6l-16.6 9.5c-9.3 5.4-13.8 16.9-10.5 27.1 7.3 23.4 19.9 45.4 36.7 63.5 7.4 8 19.2 9.8 28.8 4.4l16.5-9.5c7 5 14.4 9.3 22.2 12.8v19c0 11 7.5 20.3 18.2 22.7 12 2.7 24.3 4 36.6 4s24.7-1.3 36.6-4c10.7-2.4 18.2-11.8 18.2-22.7v-19c7.8-3.5 15.2-7.8 22.2-12.8l16.5 9.5c9.4 5.4 21.3 3.6 28.7-4.4 16.8-18.1 29.4-40.1 36.7-63.4 3.4-10.4-1.1-21.9-10.5-27.3zm-51.6 7.2l29.4 17c-5.3 14.3-13 27.8-22.8 39.5l-29.4-17c-21.4 18.3-24.5 20.1-51.1 29.5v34c-15.1 2.6-30.6 2.6-45.6 0v-34c-26.9-9.5-30.2-11.7-51.1-29.5l-29.4 17c-9.8-11.8-17.6-25.2-22.8-39.5l29.4-17c-4.9-26.8-5.2-30.6 0-59l-29.4-17c5.2-14.3 13-27.7 22.8-39.5l29.4 17c21.4-18.3 24.5-20.1 51.1-29.5v-34c15.1-2.5 30.7-2.5 45.6 0v34c26.8 9.5 30.2 11.6 51.1 29.5l29.4-17c9.8 11.8 17.6 25.2 22.8 39.5l-29.4 17c4.9 26.8 5.2 30.6 0 59z\" class=\"\"></path></svg>&nbsp;&nbsp;<span class=\"navtext\">Admin</span></a>";
              }
            ?>
            
            <br><br>

            <!--Dark mode-->
            <a href="scripts/theme.php?as=dark" class=""><svg class="navsizing <?php if($theme=='dark'){echo 'halfopacitynav';}?>" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="moon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-moon fa-w-16 fa-5x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M448.964 365.617C348.188 384.809 255.14 307.765 255.14 205.419c0-58.893 31.561-112.832 82.574-141.862 25.83-14.7 19.333-53.859-10.015-59.28A258.114 258.114 0 0 0 280.947 0c-141.334 0-256 114.546-256 256 0 141.334 114.547 256 256 256 78.931 0 151.079-35.924 198.85-94.783 18.846-23.22-1.706-57.149-30.833-51.6zM280.947 480c-123.712 0-224-100.288-224-224s100.288-224 224-224c13.984 0 27.665 1.294 40.94 3.745-58.972 33.56-98.747 96.969-98.747 169.674 0 122.606 111.613 214.523 231.81 191.632C413.881 447.653 351.196 480 280.947 480z" class=""></path></svg>&nbsp;&nbsp;&nbsp;<span class="navtext">Dark Theme</span></a>

            <br><br>

            <!--Light mode-->
            <a href="scripts/theme.php?as=default" class=""><svg class="navsizing <?php if($theme=='light'){echo 'halfopacitynav';}?>" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sun" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sun fa-w-16 fa-5x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M256 143.7c-61.8 0-112 50.3-112 112.1s50.2 112.1 112 112.1 112-50.3 112-112.1-50.2-112.1-112-112.1zm0 192.2c-44.1 0-80-35.9-80-80.1s35.9-80.1 80-80.1 80 35.9 80 80.1-35.9 80.1-80 80.1zm256-80.1c0-5.3-2.7-10.3-7.1-13.3L422 187l19.4-97.9c1-5.2-.6-10.7-4.4-14.4-3.8-3.8-9.1-5.5-14.4-4.4l-97.8 19.4-55.5-83c-6-8.9-20.6-8.9-26.6 0l-55.5 83-97.8-19.5c-5.3-1.1-10.6.6-14.4 4.4-3.8 3.8-5.4 9.2-4.4 14.4L90 187 7.1 242.5c-4.4 3-7.1 8-7.1 13.3 0 5.3 2.7 10.3 7.1 13.3L90 324.6l-19.4 97.9c-1 5.2.6 10.7 4.4 14.4 3.8 3.8 9.1 5.5 14.4 4.4l97.8-19.4 55.5 83c3 4.5 8 7.1 13.3 7.1s10.3-2.7 13.3-7.1l55.5-83 97.8 19.4c5.4 1.2 10.7-.6 14.4-4.4 3.8-3.8 5.4-9.2 4.4-14.4L422 324.6l82.9-55.5c4.4-3 7.1-8 7.1-13.3zm-116.7 48.1c-5.4 3.6-8 10.1-6.8 16.4l16.8 84.9-84.8-16.8c-6.6-1.4-12.8 1.4-16.4 6.8l-48.1 72-48.1-71.9c-3-4.5-8-7.1-13.3-7.1-1 0-2.1.1-3.1.3l-84.8 16.8 16.8-84.9c1.2-6.3-1.4-12.8-6.8-16.4l-71.9-48.1 71.9-48.2c5.4-3.6 8-10.1 6.8-16.4l-16.8-84.9 84.8 16.8c6.5 1.3 12.8-1.4 16.4-6.8l48.1-72 48.1 72c3.6 5.4 9.9 8.1 16.4 6.8l84.8-16.8-16.8 84.9c-1.2 6.3 1.4 12.8 6.8 16.4l71.9 48.2-71.9 48z" class=""></path></svg>&nbsp;&nbsp;&nbsp;<span class="navtext">Light Theme</span></a>
            
            <br><br>
            
            <!--Logout-->
            <a href="../logout.php" class="">
            <svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-out-alt fa-w-16 fa-3x"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M160 217.1c0-8.8 7.2-16 16-16h144v-93.9c0-7.1 8.6-10.7 13.6-5.7l141.6 143.1c6.3 6.3 6.3 16.4 0 22.7L333.6 410.4c-5 5-13.6 1.5-13.6-5.7v-93.9H176c-8.8 0-16-7.2-16-16v-77.7m-32 0v77.7c0 26.5 21.5 48 48 48h112v61.9c0 35.5 43 53.5 68.2 28.3l141.7-143c18.8-18.8 18.8-49.2 0-68L356.2 78.9c-25.1-25.1-68.2-7.3-68.2 28.3v61.9H176c-26.5 0-48 21.6-48 48zM0 112v288c0 26.5 21.5 48 48 48h132c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12H48c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16h132c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12H48C21.5 64 0 85.5 0 112z" class=""></path></svg>&nbsp;&nbsp;&nbsp;<span class="navtext">Logout</span></a>
          </div>
        </div>
      </div>

      <script>  
        /*window.addEventListener('click', function(e){   
          if (document.getElementById('nav').contains(e.target)){
            // Clicked in box
          } else{
            // Clicked outside the box
          }
        });*/
        $(document).ready(function(){
          // Opens the second nav
          $(document).on('click', '.secondnavshow', function(){
            document.getElementById("navone").style.display = 'none';
            document.getElementById("navtwo").style.display = 'initial';
          });

          // Closes the second nav when the nav is closed
          $(document).on('click', '.closebtn', function(){
            document.getElementById("navone").style.display = 'initial';
            document.getElementById("navtwo").style.display = 'none';
          });

          // Closes the second nav
          $(document).on('click', '.closesecondnav', function(){
            document.getElementById("navone").style.display = 'initial';
            document.getElementById("navtwo").style.display = 'none';
          });
        });

        
      </script>
      <style>
        /*div.navitem {
          padding-bottom: 5px;
        }

        div.navtwo {
          display: none;
        }

        .folder-add-plus {
          height: 16px;
          width: auto;
        }*/
      </style>