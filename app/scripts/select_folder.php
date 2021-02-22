<?php
// Gets the init file
include('init.php');

// Gets everything from the DB
if(isset($_GET['folderid'])){
  $folderid = $_GET['folderid'];

  // Gets the document that gets everything from the db
  $getfolderitems = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account AND `folderid` = :folderid ORDER BY `priority` ASC");
  $getfolderitems->execute([
    'account' => $account,
    'folderid' => $folderid
  ]);
  $folderitemslist = $getfolderitems->rowCount() ? $getfolderitems : [];

  $foldeget = $db->prepare("SELECT * FROM `taskable_folders` WHERE `account` = :account AND `folderid` = :folderid");
  $foldeget->execute([
    'account' => $account,
    'folderid' => $folderid
  ]);
  $folderlist = $foldeget->rowCount() ? $foldeget : [];
}
?>
      <div class="folder-items">
        <div class="alert">
          <p>Are you sure you want to delete this folder? When you delete it, you will not be able to recovery any tasks from this folder.</p><br>
          <a href="#" class="alert-close button">No</a>&nbsp;&nbsp;<a href="scripts/del_folder.php?folderid=<?php echo $folderid; ?>" class="alert-close button">Yes</a>
        </div>
        <?php foreach($folderlist as $item):?>
          <?php $decryptedfoldertask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv); ?>
          <form id="nameupdate">
            <span class="alert-show-folder"><img class="trash-folder-icon" src="icons/trash-solid.svg"></a></span>&nbsp;&nbsp;<input type="text" class="form-control-folder-name" required value="<?php echo $decryptedfoldertask; ?>" name="foldername" id="foldername">
            
            <br><br>
          </form>
          <script> 
          </script>
        <?php endforeach; ?>
        <div class="selectedfolderitems">
          <?php foreach($folderitemslist as $item):?>
            <?php include('../dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="folderselectform"  method="POST">
          <input class="form-control" type="text" name="task" id="folderselectinput" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#folderselectform', function(event){
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
              var taskvar = document.getElementById("folderselectinput").value;
              $( ".selectedfolderitems" ).append( `
              <?php include('../dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_folder_task.php?taskid=${taskid}&folder=<?php echo $folderid; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#folderselectform')[0].reset();
            });

            // Updates the name of the folder
            $( "#nameupdate" ).keyup(function(){
              var foldervar = document.getElementById("foldername").value;
                $.ajax({
                url: `scripts/folder_name_update.php?folderid=<?php echo $folderid; ?>&name=${foldervar}`,
                method:"POST",
                data:$(this).serialize(),
              })
            });

            // Opens the alert box when the trash button is pressed
            $(document).on('click', '.alert-show-folder', function(){
              $('.alert').css('display', 'inherit');
            });

            // Close the alert folder when the no button is pressed
            $(document).on('click', '.alert-close', function(){
              $('.alert').css('display', 'none');
            });

          });
        </script>
      </div>