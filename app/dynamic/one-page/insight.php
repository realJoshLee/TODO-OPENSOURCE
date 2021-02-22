    <div class="main" id="main">
      <?php $spacer = "<br><br><br>"; ?>
      <!--today-->
      <div class="today">
        <h2 class="insight-header blue"><span class="day"><?php echo date('D', strtotime('+0 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+0 day')); ?></span></h2>
        <div class="todayitems <?php echo date('Y-m-d', strtotime('+0 day')); ?> <?php echo date('M.d.Y', strtotime('+0 day')); ?>">
          <?php foreach($todayitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="todayform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtoday" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#todayform', function(event){
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
              var taskvar = document.getElementById("taskinputtoday").value;
              $( ".todayitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
              var taskvar = document.getElementById("taskinputtoday").value;
              $( ".todaytodayitems" ).append( `
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
              $('#todayform')[0].reset();
            });
          });
        </script>
      </div>
      <!--today-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--one-->
      <div class="one">
        <div class="oneitems <?php echo date('Y-m-d', strtotime('+1 day')); ?> <?php echo date('M.d.Y', strtotime('+1 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+1 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+1 day')); ?></span></h2>
          <?php foreach($oneitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="oneform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputone" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#oneform', function(event){
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
              var taskvar = document.getElementById("taskinputone").value;
              $( ".oneitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $one; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#oneform')[0].reset();
            });
          });
        </script>
      </div>
      <!--one-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--two-->
      <div class="two">
        <div class="twoitems <?php echo date('Y-m-d', strtotime('+2 day')); ?> <?php echo date('M.d.Y', strtotime('+2 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+2 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+2 day')); ?></span></h2>
          <?php foreach($twoitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twoform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwo" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twoform', function(event){
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
              var taskvar = document.getElementById("taskinputtwo").value;
              $( ".twoitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $two; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twoform')[0].reset();
            });
          });
        </script>
      </div>
      <!--two-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--three-->
      <div class="three">
        <div class="threeitems <?php echo date('Y-m-d', strtotime('+3 day')); ?> <?php echo date('M.d.Y', strtotime('+3 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+3 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+3 day')); ?></span></h2>
          <?php foreach($threeitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="threeform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputthree" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#threeform', function(event){
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
              var taskvar = document.getElementById("taskinputthree").value;
              $( ".threeitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $three; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#threeform')[0].reset();
            });
          });
        </script>
      </div>
      <!--three-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--four-->
      <div class="four">
        <div class="fouritems <?php echo date('Y-m-d', strtotime('+4 day')); ?> <?php echo date('M.d.Y', strtotime('+4 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+4 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+4 day')); ?></span></h2>
          <?php foreach($fouritems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="fourform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputfour" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#fourform', function(event){
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
              var taskvar = document.getElementById("taskinputfour").value;
              $( ".fouritems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $four; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#fourform')[0].reset();
            });
          });
        </script>
      </div>
      <!--four-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--five-->
      <div class="five">
        <div class="fiveitems <?php echo date('Y-m-d', strtotime('+5 day')); ?> <?php echo date('M.d.Y', strtotime('+5 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+5 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+5 day')); ?></span></h2>
          <?php foreach($fiveitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="fiveform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputfive" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#fiveform', function(event){
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
              var taskvar = document.getElementById("taskinputfive").value;
              $( ".fiveitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $five; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#fiveform')[0].reset();
            });
          });
        </script>
      </div>
      <!--five-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--six-->
      <div class="six">
        <div class="sixitems <?php echo date('Y-m-d', strtotime('+6 day')); ?> <?php echo date('M.d.Y', strtotime('+6 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+6 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+6 day')); ?></span></h2>
          <?php foreach($sixitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="sixform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputsix" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#sixform', function(event){
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
              var taskvar = document.getElementById("taskinputsix").value;
              $( ".sixitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $six; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#sixform')[0].reset();
            });
          });
        </script>
      </div>
      <!--six-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--seven-->
      <div class="seven">
        <div class="sevenitems <?php echo date('Y-m-d', strtotime('+7 day')); ?> <?php echo date('M.d.Y', strtotime('+7 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+7 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+7 day')); ?></span></h2>
          <?php foreach($sevenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="sevenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputseven" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#sevenform', function(event){
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
              var taskvar = document.getElementById("taskinputseven").value;
              $( ".sevenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $seven; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#sevenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--seven-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--eight-->
      <div class="eight">
        <div class="eightitems <?php echo date('Y-m-d', strtotime('+8 day')); ?> <?php echo date('M.d.Y', strtotime('+8 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+8 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+8 day')); ?></span></h2>
          <?php foreach($eightitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="eightform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputeight" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#eightform', function(event){
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
              var taskvar = document.getElementById("taskinputeight").value;
              $( ".eightitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $eight; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#eightform')[0].reset();
            });
          });
        </script>
      </div>
      <!--eight-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--nine-->
      <div class="nine">
        <div class="nineitems <?php echo date('Y-m-d', strtotime('+9 day')); ?> <?php echo date('M.d.Y', strtotime('+9 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+9 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+9 day')); ?></span></h2>
          <?php foreach($nineitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="nineform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputnine" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#nineform', function(event){
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
              var taskvar = document.getElementById("taskinputnine").value;
              $( ".nineitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $nine; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#nineform')[0].reset();
            });
          });
        </script>
      </div>
      <!--nine-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--ten-->
      <div class="ten">
        <div class="tenitems <?php echo date('Y-m-d', strtotime('+10 day')); ?> <?php echo date('M.d.Y', strtotime('+10 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+10 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+10 day')); ?></span></h2>
          <?php foreach($tenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="tenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputten" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#tenform', function(event){
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
              var taskvar = document.getElementById("taskinputten").value;
              $( ".tenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $ten; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#tenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--ten-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--eleven-->
      <div class="eleven">
        <div class="elevenitems <?php echo date('Y-m-d', strtotime('+11 day')); ?> <?php echo date('M.d.Y', strtotime('+11 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+11 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+11 day')); ?></span></h2>
          <?php foreach($elevenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="elevenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputeleven" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#elevenform', function(event){
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
              var taskvar = document.getElementById("taskinputeleven").value;
              $( ".elevenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $eleven; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#elevenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--eleven-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twelve-->
      <div class="twelve">
        <div class="twelveitems <?php echo date('Y-m-d', strtotime('+12 day')); ?> <?php echo date('M.d.Y', strtotime('+12 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+12 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+12 day')); ?></span></h2>
          <?php foreach($twelveitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twelveform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwelve" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twelveform', function(event){
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
              var taskvar = document.getElementById("taskinputtwelve").value;
              $( ".twelveitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twelve; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twelveform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twelve-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--thirteen-->
      <div class="thirteen">
        <div class="thirteenitems <?php echo date('Y-m-d', strtotime('+13 day')); ?> <?php echo date('M.d.Y', strtotime('+13 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+13 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+13 day')); ?></span></h2>
          <?php foreach($thirteenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="thirteenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputthirteen" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#thirteenform', function(event){
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
              var taskvar = document.getElementById("taskinputthirteen").value;
              $( ".thirteenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $thirteen; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#thirteenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--thirteen-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--fourteen-->
      <div class="fourteen">
        <div class="fourteenitems <?php echo date('Y-m-d', strtotime('+14 day')); ?> <?php echo date('M.d.Y', strtotime('+14 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+14 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+14 day')); ?></span></h2>
          <?php foreach($fourteenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="fourteenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputfourteen" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#fourteenform', function(event){
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
              var taskvar = document.getElementById("taskinputfourteen").value;
              $( ".fourteenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $fourteen; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#fourteenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--fourteen-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--fifteen-->
      <div class="fifteen">
        <div class="fifteenitems <?php echo date('Y-m-d', strtotime('+15 day')); ?> <?php echo date('M.d.Y', strtotime('+15 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+15 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+15 day')); ?></span></h2>
          <?php foreach($fifteenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="fifteenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputfifteen" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#fifteenform', function(event){
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
              var taskvar = document.getElementById("taskinputfifteen").value;
              $( ".fifteenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $fifteen; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#fifteenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--fifteen-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--sixteen-->
      <div class="sixteen">
        <div class="sixteenitems <?php echo date('Y-m-d', strtotime('+16 day')); ?> <?php echo date('M.d.Y', strtotime('+16 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+16 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+16 day')); ?></span></h2>
          <?php foreach($sixteenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="sixteenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputsixteen" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#sixteenform', function(event){
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
              var taskvar = document.getElementById("taskinputsixteen").value;
              $( ".sixteenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $sixteen; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#sixteenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--sixteen-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--seventeen-->
      <div class="seventeen">
        <div class="seventeenitems <?php echo date('Y-m-d', strtotime('+17 day')); ?> <?php echo date('M.d.Y', strtotime('+17 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+17 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+17 day')); ?></span></h2>
          <?php foreach($seventeenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="seventeenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputseventeen" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#seventeenform', function(event){
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
              var taskvar = document.getElementById("taskinputseventeen").value;
              $( ".seventeenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $seventeen; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#seventeenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--seventeen-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--eightteen-->
      <div class="eightteen">
        <div class="eightteenitems <?php echo date('Y-m-d', strtotime('+18 day')); ?> <?php echo date('M.d.Y', strtotime('+18 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+18 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+18 day')); ?></span></h2>
          <?php foreach($eightteenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="eightteenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputeightteen" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#eightteenform', function(event){
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
              var taskvar = document.getElementById("taskinputeightteen").value;
              $( ".eightteenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $eightteen; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#eightteenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--eightteen-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--nineteen-->
      <div class="nineteen">
        <div class="nineteenitems <?php echo date('Y-m-d', strtotime('+19 day')); ?> <?php echo date('M.d.Y', strtotime('+19 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+19 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+19 day')); ?></span></h2>
          <?php foreach($nineteenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="nineteenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputnineteen" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#nineteenform', function(event){
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
              var taskvar = document.getElementById("taskinputnineteen").value;
              $( ".nineteenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $nineteen; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#nineteenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--nineteen-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twenty-->
      <div class="twenty">
        <div class="twentyitems <?php echo date('Y-m-d', strtotime('+20 day')); ?> <?php echo date('M.d.Y', strtotime('+20 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+20 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+20 day')); ?></span></h2>
          <?php foreach($twentyitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentyform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwenty" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentyform', function(event){
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
              var taskvar = document.getElementById("taskinputtwenty").value;
              $( ".twentyitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twenty; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentyform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twenty-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentyone-->
      <div class="twentyone">
        <div class="twentyoneitems <?php echo date('Y-m-d', strtotime('+21 day')); ?> <?php echo date('M.d.Y', strtotime('+21 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+21 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+21 day')); ?></span></h2>
          <?php foreach($twentyoneitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentyoneform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentyone" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentyoneform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentyone").value;
              $( ".twentyoneitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentyone; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentyoneform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentyone-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentytwo-->
      <div class="twentytwo">
        <div class="twentytwoitems <?php echo date('Y-m-d', strtotime('+22 day')); ?> <?php echo date('M.d.Y', strtotime('+22 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+22 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+22 day')); ?></span></h2>
          <?php foreach($twentytwoitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentytwoform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentytwo" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentytwoform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentytwo").value;
              $( ".twentytwoitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentytwo; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentytwoform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentytwo-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentythree-->
      <div class="twentythree">
        <div class="twentythreeitems <?php echo date('Y-m-d', strtotime('+23 day')); ?> <?php echo date('M.d.Y', strtotime('+23 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+23 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+23 day')); ?></span></h2>
          <?php foreach($twentythreeitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentythreeform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentythree" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentythreeform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentythree").value;
              $( ".twentythreeitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentythree; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentythreeform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentythree-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentyfour-->
      <div class="twentyfour">
        <div class="twentyfouritems <?php echo date('Y-m-d', strtotime('+24 day')); ?> <?php echo date('M.d.Y', strtotime('+24 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+24 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+24 day')); ?></span></h2>
          <?php foreach($twentyfouritems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentyfourform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentyfour" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentyfourform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentyfour").value;
              $( ".twentyfouritems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentyfour; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentyfourform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentyfour-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentyfive-->
      <div class="twentyfive">
        <div class="twentyfiveitems <?php echo date('Y-m-d', strtotime('+25 day')); ?> <?php echo date('M.d.Y', strtotime('+25 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+25 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+25 day')); ?></span></h2>
          <?php foreach($twentyfiveitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentyfiveform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentyfive" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentyfiveform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentyfive").value;
              $( ".twentyfiveitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentyfive; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentyfiveform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentyfive-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentysix-->
      <div class="twentysix">
        <div class="twentysixitems <?php echo date('Y-m-d', strtotime('+26 day')); ?> <?php echo date('M.d.Y', strtotime('+26 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+26 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+26 day')); ?></span></h2>
          <?php foreach($twentysixitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentysixform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentysix" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentysixform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentysix").value;
              $( ".twentysixitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentysix; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentysixform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentysix-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentyseven-->
      <div class="twentyseven">
        <div class="twentysevenitems <?php echo date('Y-m-d', strtotime('+27 day')); ?> <?php echo date('M.d.Y', strtotime('+27 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+27 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+27 day')); ?></span></h2>
          <?php foreach($twentysevenitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentysevenform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentyseven" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentysevenform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentyseven").value;
              $( ".twentysevenitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentyseven; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentysevenform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentyseven-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentyeight-->
      <div class="twentyeight">
        <div class="twentyeightitems <?php echo date('Y-m-d', strtotime('+28 day')); ?> <?php echo date('M.d.Y', strtotime('+28 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+28 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+28 day')); ?></span></h2>
          <?php foreach($twentyeightitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentyeightform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentyeight" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentyeightform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentyeight").value;
              $( ".twentyeightitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentyeight; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentyeightform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentyeight-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--twentynine-->
      <div class="twentynine">
        <div class="twentynineitems <?php echo date('Y-m-d', strtotime('+29 day')); ?> <?php echo date('M.d.Y', strtotime('+29 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+29 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+29 day')); ?></span></h2>
          <?php foreach($twentynineitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="twentynineform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputtwentynine" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#twentynineform', function(event){
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
              var taskvar = document.getElementById("taskinputtwentynine").value;
              $( ".twentynineitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $twentynine; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#twentynineform')[0].reset();
            });
          });
        </script>
      </div>
      <!--twentynine-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--thirty-->
      <div class="thirty">
        <div class="thirtyitems <?php echo date('Y-m-d', strtotime('+30 day')); ?> <?php echo date('M.d.Y', strtotime('+30 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+30 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+30 day')); ?></span></h2>
          <?php foreach($thirtyitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="thirtyform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputthirty" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#thirtyform', function(event){
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
              var taskvar = document.getElementById("taskinputthirty").value;
              $( ".thirtyitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $thirty; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#thirtyform')[0].reset();
            });
          });
        </script>
      </div>
      <!--thirty-->

      <!--##############################-->
      <?php echo $spacer; ?>
      <!--##############################-->

      <!--thirtyone-->
      <div class="thirtyone">
        <div class="thirtyoneitems <?php echo date('Y-m-d', strtotime('+31 day')); ?> <?php echo date('M.d.Y', strtotime('+31 day')); ?>">
          <h2 class="insight-header"><span class="day"><?php echo date('D', strtotime('+31 day')); ?></span>&nbsp;<span class="date"><?php echo date('M.d', strtotime('+31 day')); ?></span></h2>
          <?php foreach($thirtyoneitems as $item):?>
            <?php include('dynamic/task-list.php'); ?>
          <?php endforeach; ?>
        </div>

        <form id="thirtyoneform"  method="POST">
          <input class="form-control" type="text" name="task" id="taskinputthirtyone" placeholder="Add a task..." required>
        </form>

        <script>
          $(document).ready(function(){
            $(document).on('submit', '#thirtyoneform', function(event){
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
              var taskvar = document.getElementById("taskinputthirtyone").value;
              $( ".thirtyoneitems" ).append( `
              <?php include('dynamic/add-task-list.php'); ?>
              ` );
                
              // Sends everything to the add_task page for it to be added to the db
              $('#submit').attr('disabled', 'disabled');
              $.ajax({
                url: `scripts/add_task.php?taskid=${taskid}&date=<?php echo $thirtyone; ?>`,
                method:"POST",
                data:$(this).serialize(),
              })

              // Clears the form
              $('#thirtyoneform')[0].reset();
            });
          });
        </script>
      </div>
      <!--thirtyone-->
    </div>