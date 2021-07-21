<?php  if($item['completed']=='false'): ?>
  <?php 
  $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
  $notesdec = openssl_decrypt(base64_decode($item['notes']), $method, $key, OPENSSL_RAW_DATA, $iv);
  ?>
  <div data-draggable="item" class="task task-main taskmain task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>">
    <div class="task-row" data-id="<?php echo $item['tid']; ?>">
      <!--Complete task btn-->
      <div class="task-column task-left">
        <span class="dot task-complete-btn" data-id="<?php echo $item['tid']; ?>"><i class="fas fa-check"></i></span>
      </div>

      <!--Task list column-->
      <div class="task-column task-right" data-id="<?php echo $item['tid']; ?>">
        <a target="_blank" href="<?php echo $decryptedtask; ?>" class="links-link"><span id="td-<?php echo $item['tid']; ?>"></span><span id="count-<?php echo $item['tid']; ?>"></span><span class="task-edit" id="pv-task-<?php echo $item['tid']; ?>" data-id="<?php echo $item['tid']; ?>"><?php echo $decryptedtask; ?></span></a>
      </div>

      <!-- Everything for the overlay-->
      <div data-draggable="stop" class="task-overlay" id="overlay-<?php echo $item['tid']; ?>">
        <div class="overlay-padding-top">
          <div id="text">
            <!--Close btn-->
            <p class="overlay-close" data-id="<?php echo $item['tid']; ?>"><i class="far fa-times-circle"></i></p>
            <div class="pt2 pt2-<?php echo $item['tid']; ?>">
              <div class="subtasks-<?php echo $item['tid']; ?>">
              </div>

              <div class="spacer">.</div>
              <span class="task-del-btn del-btn-style" data-id="<?php echo $item['tid']; ?>">Delete Task</span>
            </div>
            <br><br>  

          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>