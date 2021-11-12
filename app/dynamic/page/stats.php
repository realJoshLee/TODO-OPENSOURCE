<div class="content noselect">
  <div class="day-container">
    <h2><span class="day">Your Productivity</span></h2>
    <p class="dailygoal"><?php echo $totalcount; ?> all-time completed tasks</p>

    <div class="cards">
      <div class="stats-container">
        <div class="stat-card">
          <div class="outer">
            <p>Completed Today</p>

            <div class="outer-bottom">
              <p><?php echo $totday; ?>/<?php echo $goal; ?></p>
            </div>
          </div>
        </div>

        <div class="stat-card">
          <div class="outer">
            <p>Completed Yesterday</p>

            <div class="outer-bottom">
              <p><?php echo $yesterday; ?>/<?php echo $goal; ?></p>
            </div>
          </div>
        </div>

        <div class="stat-card">
          <div class="outer">
            <p>Completed This Month</p>

            <div class="outer-bottom">
              <p><?php echo $thismonth; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

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
              'rgba(84, 96, 254, 0.5)'
            ],
            borderColor: [
              'rgba(66, 77, 228, 1)'
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