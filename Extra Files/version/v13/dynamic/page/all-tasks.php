<div class="content">
  <div class="day-container">
    <h2><span class="day">All Tasks</span></h2>
    <div class="task-container" id="inbox">
    <?php foreach($alltasks as $item): ?>
      <?php if($item['completed']=='true'): ?>
      <?php
        $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
      ?>
      <div class="task">
        <div class="task-row">
          <!--Complete task btn-->
          <div class="task-column task-left">
            <span class="dot-completed"><i class="fas fa-check"></i></span>
          </div>

          <!--Task list column-->
          <div class="task-column task-right">
            <span class="task-edit"><?php echo $decryptedtask; ?></span>
            <br>
            <span class="log-date-completed"><?php echo $item['dateshowcomplete']; ?></span>
          </div>
        </div>
      </div>
      <?php endif; ?>
    <?php endforeach; ?>
    </div>
  </div>
</div>