<?php if (!$item['done']) : ?>
  <li>
    <?php $priority = $item['priority']; ?>
    <?php include('dynamic/priority.php'); ?>
    <!--For the dropdown-->
    <?php include('dynamic/dropdown.php'); ?>
    <a href="functions.php?action=mark&item=<?php echo $item['id'] ?>" class="done-button inline"><span class="dot dot-<?php echo $item['id']; ?>"></span></a>

    <span class="item<?php echo $item['done'] ? 'done' : '' ?>">
    <?php $decrypted = openssl_decrypt(base64_decode($item['name']), $method, $key, OPENSSL_RAW_DATA, $iv);?>
      <form class="inline" id="task-form" method="post" action="actions.php?action=taskupdate">
        <input onchange="this.form.submit()" name="tasktext" class="task-box" value="<?php echo $decrypted; ?>">
        <input class="display-none" type="text" name="taskid" value="<?php echo $item['id']; ?>">
      </form>
    </span>
  </li>
<?php endif; ?>