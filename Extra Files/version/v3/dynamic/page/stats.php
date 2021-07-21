<div class="content">
  <div class="day-container">
    <h2><span class="day">Your Productivity</span></h2>
    <p class="dailygoal">Daily Completion Goal: <?php echo $goal; ?></p>
    <p class="dailygoal"><?php echo $totalcount; ?> completed tasks</p>

    <br><br>
        
    <h3 class="day">Past 7 Days:</h3>
    <p>Tasks completed in the past 7 days.</p>
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

    <br><br>
        
    <h3 class="day">Time:</h3>
    <p>Tasks completed today by the hour.</p>
    <!--Bar Chart-->
    <canvas id="myChart2" width="100%" height="50px"></canvas>
    <script>
      var ctx2 = document.getElementById('myChart2').getContext('2d');
      var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: ['1am', '2am', '3am', '4am', '5am', '6am', '7am', '8am', '9am', '10am', '11am', '12pm', '1pm', '2pm', '3pm', '4pm', '5pm', '6pm', '7pm', '8pm', '9pm', '10pm', '11pm', '12am'],
          datasets: [{
            label: 'Completed Tasks by Hour',
            data: [<?php echo $oneam; ?>, <?php echo $twoam; ?>, <?php echo $threeam; ?>, <?php echo $fouram; ?>, <?php echo $fiveam; ?>, <?php echo $sixam; ?>, <?php echo $sevenam; ?>, <?php echo $eightam; ?>, <?php echo $nineam; ?>, <?php echo $tenam; ?>, <?php echo $elevenam; ?>, <?php echo $twelvepm; ?>, <?php echo $onepm; ?>, <?php echo $twopm; ?>, <?php echo $threepm; ?>, <?php echo $fourpm; ?>, <?php echo $fivepm; ?>, <?php echo $sixpm; ?>, <?php echo $sevenpm; ?>, <?php echo $eightpm; ?>, <?php echo $ninepm; ?>, <?php echo $tenpm; ?>, <?php echo $elevenpm; ?>, <?php echo $twelveam; ?>],
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

    <br><br>
        
    <h3 class="day">Month:</h3>
    <p>Tasks completed this year by the Month.</p>
    <!--Bar Chart-->
    <canvas id="myChart3" width="100%" height="50px"></canvas>
    <script>
      var ctx3 = document.getElementById('myChart3').getContext('2d');
      var myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
          datasets: [{
            label: 'Completed Tasks by Month',
            data: [<?php echo $Jan; ?>, <?php echo $Feb; ?>, <?php echo $Mar; ?>, <?php echo $Apr; ?>, <?php echo $May; ?>, <?php echo $June; ?>, <?php echo $July; ?>, <?php echo $Aug; ?>, <?php echo $Sept; ?>, <?php echo $Oct; ?>, <?php echo $Nov; ?>, <?php echo $Dec; ?>],
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

    <br><br><br>
  </div>
</div>