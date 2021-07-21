<?php
  include('init/init.php');

  $logdate = date('M-d-Y h:i:sa', strtotime('+0 day'));
  $cfdata = file_get_contents('https://www.cloudflare.com/cdn-cgi/trace');
  $apploadQuery = $db->prepare("
    INSERT INTO tasks_log (account, content, cfdata, date)
    VALUES (:account, :content, :cfdata, :date)
  ");
  $apploadcontent = 'Reports load';
  $apploadQuery->execute([
    ':account' => $account,
    ':content' => $apploadcontent,
    ':cfdata' => $cfdata,
    ':date' => $logdate
  ]);

  if($setup=='false'){
    header('Location: setup.php');
  }

  include('dynamic/stats-get.php');
?>
<!DOCTYPE html>
<html lang="en" class="theme-ctrl <?php if($theme=='dark'){echo'dark';} ?> <?php if($theme=='black'){echo'black';} ?>">
  <head>
    <?php include('dynamic/header-content.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  </head>
  <body class="theme-ctrl <?php if($theme=='dark'){echo'dark';} ?> <?php if($theme=='black'){echo'black';} ?>">
    <div class="content">
      <div class="heading">
        <h2>Reports</h2>
        <p class="dailygoal"><b>Daily Completion Goal:</b> <?php echo $goal; ?></p>

        <br>
        
        <!--Bar Chart-->
        <canvas id="myChart" width="100%" height="50px"></canvas>
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['<?php echo $onedate; ?>', '<?php echo $twodate; ?>', '<?php echo $threedate; ?>', '<?php echo $fourdate; ?>', '<?php echo $fivedate; ?>', '<?php echo $sixdate; ?>', '<?php echo $sevendate; ?>'],
            datasets: [{
              label: 'Completed Tasks',
              data: [<?php echo $onecount; ?>, <?php echo $twocount; ?>, <?php echo $threecount; ?>, <?php echo $fourcount; ?>, <?php echo $fivecount; ?>, <?php echo $sixcount; ?>, <?php echo $sevencount; ?>],
              backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
              ],
              borderColor: [
                'rgba(54, 162, 235, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
        </script>
      </div>
    </div>
  </body>
</html>
<style>
<?php include('style/stats.css'); ?>
</style>