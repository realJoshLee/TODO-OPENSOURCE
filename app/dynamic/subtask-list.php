<div class="sub-task" data-id="<?php echo $subitem['taskid']; ?>">
  <a href="#" class="task-complete no-decor" data-id="<?php echo $subitem['taskid']; ?>">
    <span id="update-<?php echo $subitem['taskid']; ?>" class="<?php if($subitem['completed']=='true'){echo 'sub-completed';}else{echo 'p3';} ?>"></span>
  </a>
  
  <!--Task display-->
  <span class="task taskclick" data-id="<?php echo $subitem['taskid']; ?>">
    <?php $decryptedsubtasks = openssl_decrypt(base64_decode($subitem['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
    <span class="task-input <?php if($subitem['completed']=='true'){echo 'sub-completed-text';} ?>" data-id="<?php echo $subitem['taskid']; ?>" contenteditable id="input-<?php echo $item['taskid']; ?>"><?php echo $decryptedsubtasks; ?></span>
  </span>        
</div>