<?php if($subitem['completed']=='false'){ ?>
  <div class="task task-<?php echo $subitem['tid']; ?>" id="task-<?php echo $subitem['tid']; ?>" data-id="<?php echo $subitem['tid']; ?>">
    <div class="task-row" data-id="<?php echo $subitem['tid']; ?>">
      <!--Complete task btn-->
      <div class="task-column task-left">
        <span class="dot task-complete-btn" data-id="<?php echo $subitem['tid']; ?>"></span>
      </div>

      <!--Task list column-->
      <div class="task-column task-right" data-id="<?php echo $subitem['tid']; ?>">
        <?php
          $dct = openssl_decrypt(base64_decode($subitem['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
        ?>
        <span class="task-edit subtaskedit ste-<?php echo $subitem['tid']; ?>" id="pv-task-<?php echo $subitem['tid']; ?>" data-id="<?php echo $subitem['tid']; ?>" contenteditable><?php echo $dct; ?></span>
      </div>
    </div>
  </div>
<?php } ?>