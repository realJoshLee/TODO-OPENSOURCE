<?php if (!$item['done']) : ?>
  <li>
    <?php $priority = $item['priority']; ?>
    <?php include('dynamic/priority.php'); ?>
    <!--For the dropdown-->
    <?php include('dynamic/dropdown.php'); ?>
    <a href="functions.php?action=mark&item=<?php echo $item['id'] ?>" class="done-button inline"><span class="dot dot-<?php echo $item['id']; ?>"></span></a>

    <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
      <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
      
      
      <form class="inline form<?php echo $item['id']; ?>" id="task-form" method="post" action="actions.php?action=taskupdate">
        <p id="input<?php echo $item['id'];?>" class="inline taskarea" contenteditable="true" onKeyPress="return checkSubmit(event)" onKeyup="updatefunction<?php echo $item['id'];?>()"><?php echo $decrypted; ?></p>
        <input onupdate="this.form.submit()" name="tasktext" class="task-box display-none" type="text" id="output<?php echo $item['id'];?>">
        <input class="display-none" type="text" name="taskid" value="<?php echo $item['id']; ?>">
        <button class="submitd" type="submit">
          <i class="fas fa-check-circle"></i>
        </button>
      </form>
      <script>
        function updatefunction<?php echo $item['id'];?>() {
          document.getElementById("output<?php echo $item['id'];?>").value = document.getElementById("input<?php echo $item['id'];?>").innerHTML;
        }

        document.getElementById("formsubmit").onclick = function() {
          document.getElementById("form<?php echo $item['id']; ?>").submit();
        }
      </script>
    </span>
  </li>
<?php endif; ?>