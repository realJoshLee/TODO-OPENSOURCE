<div class="content">
  <div class="day-container">
    <h2><span class="day">Your Productivity</span></h2>
    <p class="dailygoal">Daily Completion Goal: <?php echo $goal; ?></p>
    <p class="dailygoal"><?php echo $totalcount; ?> completed tasks</p>

    <br><br>
        
    <h3 class="day">Past 7 Days:</h3>
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