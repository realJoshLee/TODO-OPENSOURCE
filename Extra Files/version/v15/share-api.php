<?php
  include('init/init.php');
  include('dynamic/get-content-from-db.php');
  include('dynamic/stats-get.php');

  $logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));
  $cfdata = file_get_contents('https://www.cloudflare.com/cdn-cgi/trace');
  $apploadQuery = $db->prepare("
    INSERT INTO tasks_log (account, content, cfdata, date)
    VALUES (:account, :content, :cfdata, :date)
  ");
  $apploadcontent = 'App load';
  $apploadQuery->execute([
    ':account' => $account,
    ':content' => $apploadcontent,
    ':cfdata' => $cfdata,
    ':date' => $logdate
  ]);

  if($setup=='false'){
    header('Location: setup.php');
  }

  // Gets the task count
  $dbget = "SELECT * FROM `tasks_tasks` WHERE `account` = '$account'";
  $conget = $conn->query($dbget);
  $taskct = mysqli_num_rows($conget);
?>
<!DOCTYPE html>
<html lang="en" class="theme-ctrl theme_<?php echo $theme; ?>">
  <head>
    <?php include('dynamic/header-content.php'); ?>
    <link rel="stylesheet" type="text/css" href="style/index.css" title="Default Styles">

    <script>
      if('serviceWorker' in navigator){
        navigator.serviceWorker.register("sw.js").then(registration => {
          console.log('Service worker has been registered.');
          //console.log(registration);
        }).catch(error => {
          console.log('Service worker registration error.');
          console.log(error);
        })
      }else{
        console.log('Service worker not supported.');
      }
    </script>
  </head>
  <body id="body" class="theme-ctrl theme_<?php echo $theme; ?>">
      <div class="content">
        <!--Links Page-->
        <div class="links-page default-hide" id="link-page">

          <!--API-->
          <div class="content">
            <div class="day-container add-content">
              <h2><span class="day">Add Link</span></h2>
              <input type="text" class="form-control-add" name="url" id="content" readonly>
              <input type="submit" class="form-control-add-submit add-link" value="Add Link">
            </div>

            <div class="day-container success-alert" style="display:none;">
              <div class="center" style="text-align: center;">
                <h2><span class="day">Link added successfully!</span></h2>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </body>
</html>
<style>
  input.form-control-add {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    
    background: none;
    border: 1px solid #ededed;
    outline: none;
    width: 100%;
    padding: 5px;
    
    font-family: 'SF UI Text Regular', Arial, Helvetica, sans-serif;
    font-size: 17px;
  }

  .form-control-add:focus {
    border: 1px solid #4169e1;
  }

  .form-control-add-submit {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    
    background: #4169e1;
    color: #fff;
    outline: none;
    border: none;
    font-size: 14px;
    cursor: pointer;
    width: 100px;

    border-radius: 3px;

    margin-top: 5px;

    padding-top: 6px;
    padding-bottom: 6px;
    padding-left: 7px;
    padding-right: 7px;
  }

  .form-control-add-submit:hover {
    opacity: 0.5;
    transition-duration: 0.3s;
  }
</style>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    const parsedUrl = new URL(window.location);
    // searchParams.get() will properly handle decoding the values.
    //$('.add-content').append('Title shared: ' + parsedUrl.searchParams.get('title') + '<br>');
    //$('.add-content').append('Text shared: ' + parsedUrl.searchParams.get('text') + '<br>');
    //$('.add-content').append('URL shared: ' + parsedUrl.searchParams.get('url') + '<br>');
    var urlget = parsedUrl.searchParams.get('text');
    $('#content').val(`${urlget}`);
  });

  $(document).on('click', '.add-link', function(event){
    var data = $(`#content`).val();
    var taskid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150);
              
    $.ajax({
      url: `sync/sync.php?as=shareapiadd`,
      method:"POST",
      data:{
        'tid': `${taskid}`,
        'task': `${data}`
      }
    })

    $('.add-content').css('display','none');
    $('.success-alert').css('display','initial');
  });
</script>