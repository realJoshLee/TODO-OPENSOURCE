<div class="main" id="main">
      <!--today-->
      <div class="todayitemspage">
        <h2 class="blue insight-header"><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
        <div class="todaytodayitems today">
          <?php foreach($todayspecialitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="todaytodayform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtodaytoday" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#todaytodayform', function(event){
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
              var taskvar = document.getElementById("taskinputtodaytoday").value;
              $( ".todaytodayitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
              var taskvar = document.getElementById("taskinputtodaytoday").value;
              $( ".todayitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $today; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#todaytodayform')[0].reset();
            });
          });
        </script>
      </div>
      <!--today-->
    </div>