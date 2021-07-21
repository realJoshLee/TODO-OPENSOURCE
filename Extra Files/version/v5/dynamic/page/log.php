<div class="content">
  <div class="day-container">
    <h2><span class="day">Log</span></h2>
    <div class="task-container" id="inbox">
    <?php foreach($log as $item): ?>
      <?php if($item['completed']=='true'): ?>
      <?php
        $decryptedtask = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
      ?>
      <div class="task log-task-spacing">
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
    <br><br>
  </div>
</div>
<style>
span.dot-completed {
  height: 20px;
  width: 20px;
  border: 3px solid #0962b9;
  background: #0962b9;
  border-radius: 40%;
  display: inline-block;
  text-align: center;
  font-size: 12px;
  color: #fff;
}

.log-task-spacing {
  padding-bottom: 5px;
}
</style>