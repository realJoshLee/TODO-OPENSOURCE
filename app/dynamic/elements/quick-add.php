<div class="quickAddContainer">
  <div class="overlay-padding-top">
    <div class="quickAddContainer-Inner">

      <!--Task input container start-->
      <form class="quickadd-task-form">
        <input type="text" name="task" placeholder="Add a task" class="form-control" id="input-quickadd">

        <br><br>

        <input type="text" name="date" placeholder="Date" class="form-control" id="input-quickadd-date">

        <br><br>

        <select id="input-quickadd-folder" class="form-control-dd">
          <option value="nofolder" selected>No Folder</option>
          <?php foreach($qafolder as $item){ 
            $taskfolderlistingdec = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);
          ?>
          <option value="<?php echo $item['fid']; ?>" data-id="<?php echo $item['fid']; ?>" class="qaf-<?php echo $taskfolderlistingdec; ?>"><?php echo $taskfolderlistingdec; ?></option>
          <?php } ?>
        </select>

        <br><br>

        <input type="submit" value="Add task" class="form-control-quick-add">
      </form>
      <!--Task input container end-->


    </div>
  </div>
</div>
