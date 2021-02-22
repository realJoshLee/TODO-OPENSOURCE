<?php
  // Gets the init file
  require('scripts/init.php');

  // Gets the document that gets everything from the db
  $historyget = $db->prepare("SELECT * FROM `taskable_tasks` WHERE `account` = :account");
  $historyget->execute([
    'account' => $account
  ]);
  $histpry = $historyget->rowCount() ? $historyget : [];

  if($preminum=='false'){
    header('Location: preminum-false.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    // Calls all of the header elements
    include('dynamic/header.php');
    ?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    <div class="main activitypage" id="main">
      <!--NAV-->
      <div class="nav-container" id="nav-container">
        <a href="index.php" class="navalign"><svg class="navsizing" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" class="svg-inline--fa fa-arrow-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php if($theme=='dark'){echo '#fff';}else{echo '#404245';}?>" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!--Account--></a>
      </div>

      <br><br>

      <h2 class="blue">Activity</h2>

      <br><br>
      <p>Select a year to view:</p>
      <a href="?y=<?php echo date("Y",strtotime("-5 year")); ?>" class="activityLink <?php if($_GET['y'] == date("Y",strtotime("-5 year"))){echo 'active';}?>"><?php echo date("Y",strtotime("-5 year")); ?></a>&nbsp;&nbsp;
      <a href="?y=<?php echo date("Y",strtotime("-4 year")); ?>" class="activityLink <?php if($_GET['y'] == date("Y",strtotime("-4 year"))){echo 'active';}?>"><?php echo date("Y",strtotime("-4 year")); ?></a>&nbsp;&nbsp;
      <a href="?y=<?php echo date("Y",strtotime("-3 year")); ?>" class="activityLink <?php if($_GET['y'] == date("Y",strtotime("-3 year"))){echo 'active';}?>"><?php echo date("Y",strtotime("-3 year")); ?></a>&nbsp;&nbsp;
      <a href="?y=<?php echo date("Y",strtotime("-2 year")); ?>" class="activityLink <?php if($_GET['y'] == date("Y",strtotime("-2 year"))){echo 'active';}?>"><?php echo date("Y",strtotime("-2 year")); ?></a>&nbsp;&nbsp;
      <a href="?y=<?php echo date("Y",strtotime("-1 year")); ?>" class="activityLink <?php if($_GET['y'] == date("Y",strtotime("-1 year"))){echo 'active';}?>"><?php echo date("Y",strtotime("-1 year")); ?></a>&nbsp;&nbsp;
      <a href="?y=<?php echo date("Y",strtotime("-0 year")); ?>" class="activityLink <?php if($_GET['y'] == date("Y",strtotime("-0 year"))){echo 'active';}?>"><?php echo date("Y",strtotime("-0 year")); ?></a>&nbsp;&nbsp;

      <?php
        $year = $_GET['y'];

        // Year
        $dby = "SELECT * FROM `taskable_tasks` WHERE `cyear` = '$year' AND `account` = '$account'";
        $cyg = $conn->query($dby);
        $cy = mysqli_num_rows($cyg);

        // Day
        $dbsun = "SELECT * FROM `taskable_tasks` WHERE `cweekday` = 'Sun' AND `account` = '$account' AND `cyear` = '$year'";
        $csung = $conn->query($dbsun);
        $csun = mysqli_num_rows($csung);

        $dbmonday = "SELECT * FROM `taskable_tasks` WHERE `cweekday` = 'Mon' AND `account` = '$account' AND `cyear` = '$year'";
        $cmong = $conn->query($dbmonday);
        $cmon = mysqli_num_rows($cmong);

        $dbtue = "SELECT * FROM `taskable_tasks` WHERE `cweekday` = 'Tue' AND `account` = '$account' AND `cyear` = '$year'";
        $ctueg = $conn->query($dbtue);
        $ctue = mysqli_num_rows($ctueg);

        $dbwed = "SELECT * FROM `taskable_tasks` WHERE `cweekday` = 'Wed' AND `account` = '$account' AND `cyear` = '$year'";
        $cwedg = $conn->query($dbwed);
        $cwed = mysqli_num_rows($cwedg);

        $dbthu = "SELECT * FROM `taskable_tasks` WHERE `cweekday` = 'Thu' AND `account` = '$account' AND `cyear` = '$year'";
        $cthug = $conn->query($dbthu);
        $cthu = mysqli_num_rows($cthug);

        $dbfri = "SELECT * FROM `taskable_tasks` WHERE `cweekday` = 'Fri' AND `account` = '$account' AND `cyear` = '$year'";
        $cfrig = $conn->query($dbfri);
        $cfri = mysqli_num_rows($cfrig);
        
        $dbsat = "SELECT * FROM `taskable_tasks` WHERE `cweekday` = 'Sat' AND `account` = '$account' AND `cyear` = '$year'";
        $csatg = $conn->query($dbsat);
        $csat = mysqli_num_rows($csatg);
        

        // Months
        $dbjan = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'jan' AND `account` = '$account' AND `cyear` = '$year'";
        $cjang = $conn->query($dbjan);
        $cjan = mysqli_num_rows($cjang);
        
        $dbfeb = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'feb' AND `account` = '$account' AND `cyear` = '$year'";
        $cfebg = $conn->query($dbfeb);
        $cfeb = mysqli_num_rows($cfebg);
        
        $dbmar = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'mar' AND `account` = '$account' AND `cyear` = '$year'";
        $cmarg = $conn->query($dbmar);
        $cmar = mysqli_num_rows($cmarg);
        
        $dbapr = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'apr' AND `account` = '$account' AND `cyear` = '$year'";
        $caprg = $conn->query($dbapr);
        $capr = mysqli_num_rows($caprg);
        
        $dbmay = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'may' AND `account` = '$account' AND `cyear` = '$year'";
        $cmayg = $conn->query($dbmay);
        $cmay = mysqli_num_rows($cmayg);
        
        $dbjun = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'jun' AND `account` = '$account' AND `cyear` = '$year'";
        $cjung = $conn->query($dbjun);
        $cjun = mysqli_num_rows($cjung);
        
        $dbjul = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'jul' AND `account` = '$account' AND `cyear` = '$year'";
        $cjulg = $conn->query($dbjul);
        $cjul = mysqli_num_rows($cjulg);
        
        $dbaug = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'aug' AND `account` = '$account' AND `cyear` = '$year'";
        $caugg = $conn->query($dbaug);
        $caug = mysqli_num_rows($caugg);
        
        $dbsep = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'sep' AND `account` = '$account' AND `cyear` = '$year'";
        $csepg = $conn->query($dbsep);
        $csep = mysqli_num_rows($csepg);
        
        $dboct = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'oct' AND `account` = '$account' AND `cyear` = '$year'";
        $coctg = $conn->query($dboct);
        $coct = mysqli_num_rows($coctg);
        
        $dbnov = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'nov' AND `account` = '$account' AND `cyear` = '$year'";
        $cnovg = $conn->query($dbnov);
        $cnov = mysqli_num_rows($cnovg);
        
        $dbdec = "SELECT * FROM `taskable_tasks` WHERE `cmonth` = 'dec' AND `account` = '$account' AND `cyear` = '$year'";
        $cdecg = $conn->query($dbdec);
        $cdec = mysqli_num_rows($cdecg);
      ?>
      <div id="stats">

        <br>

        <h4 class="blue">Total Tasks Completed in <?php echo $year; ?></h4>
        <h3 class="blue"><?php echo $cy; ?></h3>

        <br>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(weekdaychart);

          function weekdaychart() {
            var data = google.visualization.arrayToDataTable([
              ['Day', 'Tasks'],
              ['Sun',  <?php echo $csun; ?>],
              ['Mon',  <?php echo $cmon; ?>],
              ['Tue',  <?php echo $ctue; ?>],
              ['Wed',  <?php echo $cwed; ?>],
              ['Thu',  <?php echo $cthu; ?>],
              ['Fri',  <?php echo $cfri; ?>],
              ['Sat',  <?php echo $csat; ?>],
            ]);

            var options = {
              title: 'Week-Day Completions',
              legend: { position: 'none' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('weekday'));

            chart.draw(data, options);
          }

          
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(yearchart);

          function yearchart() {
            var data = google.visualization.arrayToDataTable([
              ['Day', 'Tasks'],
              ['Jan',  <?php echo $cjan; ?>],
              ['Feb',  <?php echo $cfeb; ?>],
              ['Mar',  <?php echo $cmar; ?>],
              ['Apr',  <?php echo $capr; ?>],
              ['May',  <?php echo $cmay; ?>],
              ['Jun',  <?php echo $cjun; ?>],
              ['Jul',  <?php echo $cjul; ?>],
              ['Aug',  <?php echo $caug; ?>],
              ['Sept',  <?php echo $csep; ?>],
              ['Oct',  <?php echo $coct; ?>],
              ['Nov',  <?php echo $cnov; ?>],
              ['Dec',  <?php echo $cdec; ?>],
            ]);

            var options = {
              title: 'Monthly Completions',
              legend: { position: 'none' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('year'));

            chart.draw(data, options);
          }
        </script>
        <div id="weekday" style="width: 100%; height: 400px"></div>
        <div id="year" style="width: 100%; height: 400px"></div>
        <br>

        <div class="weekday">
          <div class="weekdaycontainer">
            <h4 class="blue">Tasks Completed on each Weekday</h4>
            <!--Sunday-->
            <p>Sunday <?php echo $csun; ?></p>
            <div class="w3-light-grey">
              <div class="w3-grey" style="height:20px;width:<?php echo $csun; ?>px;"></div>
            </div>

            <br>

            <!--Monday-->
            <p>Monday <?php echo $cmon; ?></p>
            <div class="w3-light-grey">
              <div class="w3-grey" style="height:20px;width:<?php echo $cmon; ?>px;"></div>
            </div>

            <br>

            <!--Tuesday-->
            <p>Tuesday <?php echo $ctue; ?></p>
            <div class="w3-light-grey">
              <div class="w3-grey" style="height:20px;width:<?php echo $ctue; ?>px;"></div>
            </div>

            <br>

            <!--Wednesday-->
            <p>Wednesday <?php echo $cwed; ?></p>
            <div class="w3-light-grey">
              <div class="w3-grey" style="height:20px;width:<?php echo $cwed; ?>px;"></div>
            </div>

            <br>

            <!--Thursday-->
            <p>Thursday <?php echo $cthu; ?></p>
            <div class="w3-light-grey">
              <div class="w3-grey" style="height:20px;width:<?php echo $cthu; ?>px;"></div>
            </div>

            <br>

            <!--Friday-->
            <p>Friday <?php echo $cfri; ?></p>
            <div class="w3-light-grey">
              <div class="w3-grey" style="height:20px;width:<?php echo $cfri; ?>px;"></div>
            </div>

            <br>

            <!--Saturday-->
            <p>Saturday <?php echo $csat; ?></p>
            <div class="w3-light-grey">
              <div class="w3-grey" style="height:20px;width:<?php echo $csat; ?>px;"></div>
            </div>
          </div>

          <br><br>

          <div class="weekday">
            <div class="weekdaycontainer">
              <h4 class="blue">Tasks Completed on each Month</h4>

              <p>January <?php echo $cjan; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cjan; ?>px;"></div>
              </div>

              <br>

              <p>February <?php echo $cfeb; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cfeb; ?>px;"></div>
              </div>

              <br>

              <p>March <?php echo $cmar; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cmar; ?>px;"></div>
              </div>

              <br>

              <p>April <?php echo $capr; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $capr; ?>px;"></div>
              </div>

              <br>

              <p>May <?php echo $cmay; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cmay; ?>px;"></div>
              </div>

              <br>

              <p>June <?php echo $cjun; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cjun; ?>px;"></div>
              </div>

              <br>

              <p>July <?php echo $cjul; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cjul; ?>px;"></div>
              </div>

              <br>

              <p>Augest <?php echo $caug; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $caug; ?>px;"></div>
              </div>

              <br>

              <p>September <?php echo $csep; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $csep; ?>px;"></div>
              </div>

              <br>

              <p>October <?php echo $coct; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $coct; ?>px;"></div>
              </div>

              <br>

              <p>November <?php echo $cnov; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cnov; ?>px;"></div>
              </div>

              <br>

              <p>December <?php echo $cdec; ?></p>
              <div class="w3-light-grey">
                <div class="w3-grey" style="height:20px;width:<?php echo $cdec; ?>px;"></div>
              </div>
            </div>
            <br><br><br>
        </div>
        <style>
          * {
            box-sizing: border-box;
          }

          .w3-grey {
            background-color: #006fff !important;
            border-radius: 5px !important;
          }

          .w3-light-grey {
            border-radius: 5px !important;
          }

          .left {
            width: 15%;
          }

          .right {
            width: 85%;
          }

          .column {
            float: left;
          }

          .row:after {
            content: "";
            display: table;
            clear: both;
          }
        </style>

      </div>
    </div>
  </body>
</html>
<?php
  // Calls the complete script and the style sheet
  include('style/index.php');
  include('../include-all-user-pages.php'); 
?>