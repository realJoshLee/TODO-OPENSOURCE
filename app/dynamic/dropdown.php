<!--For the dropdown-->
<div class="dropdown">
  <span><i class="fas fa-ellipsis-h black"></i></span>
  <div class="dropdown-content">
    <a href="functions.php?action=delete&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-trash red"></i></a>&nbsp;
    <a href="functions.php?action=inbox&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-inbox"></i></a>&nbsp;
    <a href="functions.php?action=staradd&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-star yello"></i></a>&nbsp;
    <a href="functions.php?action=starremove&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-star red"></i></a>&nbsp;
    
    &nbsp;&nbsp;

    <a href="functions.php?action=priorityone&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-flag p1"></i></a>&nbsp;
    <a href="functions.php?action=prioritytwo&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-flag p2"></i></a>&nbsp;
    <a href="functions.php?action=prioritythree&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-flag p3"></i></a>&nbsp;

    <br><br>

    <a href="functions.php?action=sunday&item=<?php echo $item['id']; ?>" class="dropdown-link"><img class="day-icon" src="assets/icons/Sunday.svg"></a>
    <a href="functions.php?action=monday&item=<?php echo $item['id']; ?>" class="dropdown-link"><img class="day-icon" src="assets/icons/Monday.svg"></a>
    <a href="functions.php?action=tuesday&item=<?php echo $item['id']; ?>" class="dropdown-link"><img class="day-icon" src="assets/icons/Tuesday.svg"></a>
    <a href="functions.php?action=wednesday&item=<?php echo $item['id']; ?>" class="dropdown-link"><img class="day-icon" src="assets/icons/Wednesday.svg"></a>
    <a href="functions.php?action=thursday&item=<?php echo $item['id']; ?>" class="dropdown-link"><img class="day-icon" src="assets/icons/Thursday.svg"></a>
    <a href="functions.php?action=friday&item=<?php echo $item['id']; ?>" class="dropdown-link"><img class="day-icon" src="assets/icons/Friday.svg"></a>
    <a href="functions.php?action=saturday&item=<?php echo $item['id']; ?>" class="dropdown-link"><img class="day-icon" src="assets/icons/Saturday.svg"></a>

    <br><br>
    
    <a href="functions.php?action=removefolderitem&item=<?php echo $item['id']; ?>" class="dropdown-link">Unorganize Task</a><br>

    <style>
      img.day-icon {
        height: 20px;
        width: 20px;

        padding: 0px;
      }

      img.day-icon:hover {
        opacity: 0.5;
        transition-duration: 0.3s;
      }
    </style>

  </div>
</div>