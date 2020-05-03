<?php
  $sunday = '<img class="day-icon" src="assets/icons/Sunday.svg">';
  $monday = '<img class="day-icon" src="assets/icons/Monday.svg">';
  $tuesday = '<img class="day-icon" src="assets/icons/Tuesday.svg">';
  $wednesday = '<img class="day-icon" src="assets/icons/Wednesday.svg">';
  $thursday = '<img class="day-icon" src="assets/icons/Thursday.svg">';
  $friday = '<img class="day-icon" src="assets/icons/Friday.svg">';
  $saturday = '<img class="day-icon" src="assets/icons/Saturday.svg">';
  ?>
<!--For the dropdown-->
<div class="dropdown">
  <span><i class="fas fa-ellipsis-h black"></i></span>
  <div class="dropdown-content">
    <a href="functions.php?action=delete&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-trash red"></i></a>&nbsp;
    <a href="functions.php?action=staradd&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-star yello"></i></a>&nbsp;
    <a href="functions.php?action=starremove&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-star red"></i></a>&nbsp;
    
    &nbsp;&nbsp;

    <a href="functions.php?action=priorityone&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-flag p1"></i></a>&nbsp;
    <a href="functions.php?action=prioritytwo&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-flag p2"></i></a>&nbsp;
    <a href="functions.php?action=prioritythree&item=<?php echo $item['id']; ?>" class="dropdown-link"><i class="fas fa-flag p3"></i></a>&nbsp;

    <br><br>

    <!--Today-->
    <a href="change-date.php?date=<?php echo $todaynav?>&item=<?php echo $item['id']; ?>" class="dropdown-link">
      <?php
        $todayiconsel = $dt->format('D');

        if($todayiconsel=='Sun'){
          echo $sunday;
        }

        if($todayiconsel=='Mon'){
          echo $monday;
        }

        if($todayiconsel=='Tue'){
          echo $tuesday;
        }

        if($todayiconsel=='Wed'){
          echo $wednesday;
        }

        if($todayiconsel=='Thu'){
          echo $thursday;
        }

        if($todayiconsel=='Fri'){
          echo $friday;
        }

        if($todayiconsel=='Sat'){
          echo $saturday;
        }
      ?>
    </a>

    <!--Tomorrow-->
    <a href="change-date.php?date=<?php echo $tomorrownav; ?>&item=<?php echo $item['id']; ?>" class="dropdown-link">
      <?php
        $tomorrowiconsel = $tomorrowtimenav->format('D');

        if($tomorrowiconsel=='Sun'){
          echo $sunday;
        }

        if($tomorrowiconsel=='Mon'){
          echo $monday;
        }

        if($tomorrowiconsel=='Tue'){
          echo $tuesday;
        }

        if($tomorrowiconsel=='Wed'){
          echo $wednesday;
        }
        
        if($tomorrowiconsel=='Thu'){
          echo $thursday;
        }

        if($tomorrowiconsel=='Fri'){
          echo $friday;
        }

        if($tomorrowiconsel=='Sat'){
          echo $saturday;
        }
      ?>
    </a>

    <!--Two days-->
    <a href="change-date.php?date=<?php echo $twodaysnav; ?>&item=<?php echo $item['id']; ?>" class="dropdown-link">
      <?php
        $twodayiconsel = $twodaystimenav->format('D');

        if($twodayiconsel=='Sun'){
          echo $sunday;
        }

        if($twodayiconsel=='Mon'){
          echo $monday;
        }

        if($twodayiconsel=='Tue'){
          echo $tuesday;
        }

        if($twodayiconsel=='Wed'){
          echo $wednesday;
        }
        
        if($twodayiconsel=='Thu'){
          echo $thursday;
        }

        if($twodayiconsel=='Fri'){
          echo $friday;
        }

        if($twodayiconsel=='Sat'){
          echo $saturday;
        }
      ?>
    </a>

    <!--Three days-->
    <a href="change-date.php?date=<?php echo $threedaysnav; ?>&item=<?php echo $item['id']; ?>" class="dropdown-link">
      <?php
        $threedayiconsel = $threedaystimenav->format('D');

        if($threedayiconsel=='Sun'){
          echo $sunday;
        }

        if($threedayiconsel=='Mon'){
          echo $monday;
        }

        if($threedayiconsel=='Tue'){
          echo $tuesday;
        }

        if($threedayiconsel=='Wed'){
          echo $wednesday;
        }
        
        if($threedayiconsel=='Thu'){
          echo $thursday;
        }

        if($threedayiconsel=='Fri'){
          echo $friday;
        }

        if($threedayiconsel=='Sat'){
          echo $saturday;
        }
      ?>
    </a>
    
    <br><br>
    
    <?php if(!$item['folder']==''): ?>
      <a href="functions.php?action=removefolderitem&item=<?php echo $item['id']; ?>" class="dropdown-link">Unorganize Task</a><br>
    <?php endif; ?>
    

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