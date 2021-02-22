<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="closemodal">&times;</span>
    <br><br>
    <form action="scripts/add_modaltask.php" method="POST" id="modalform">
      <input autofocus autocomplete="off" placeholder="Add a task..." required type="text" class="form-control" style="border: 1px solid #f2f2f2 !important" name="modaltaskname" id="modaltask"><br><br>
      <label class="tip">To add a date put it in parentheses like this: (Aug.02.2020)</label>
      <div class="right" style="text-align:right;padding-top:10px;">
        <input type="submit" class="form-control-submit" name="submit" value="Add To Today">
      </div>
    </form>
  </div>
</div>
<script>
  // Gets everything from the document
  var modal = document.getElementById("myModal");
  var closemodal = document.getElementsByClassName("closemodal")[0];

  // Closes the modal when you click on the x button
  closemodal.onclick = function() {
    modal.style.display = "none";
  }

  // Closes the modal when you click outside of the modal
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  // Opens the quick add when you press alt
  document.onkeydown = function(e){
    e = e || window.event;
    var key = e.which || e.keyCode;
    if(key===18){
      modal.style.display = "block";
    }
  }

  /*$(document).on('submit', '#thirtyoneform', function(event){
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
      <?php //include('dynamic/add-task-list.php'); ?>
    ` );
                
    // Sends everything to the add_task page for it to be added to the db
    $('#submit').attr('disabled', 'disabled');
    $.ajax({
      url: `scripts/add_task.php?taskid=${taskid}&date=<?php //echo $thirtyone; ?>`,
      method:"POST",
      data:$(this).serialize(),
    })

    // Clears the form
    $('#thirtyoneform')[0].reset();
  });*/
</script>