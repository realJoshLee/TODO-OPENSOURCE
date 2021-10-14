<div class="content">
  <div class="day-container">
    <h2><span class="day noselect">Alerts</span></h2>
    <div class="alert-container">
      <h3><span class="day noselect">Login Alerts:</span></h3>
      <?php foreach($alerts as $item): ?>
        <div class="alert-item">
          <div class="name">
            <p class="alert-name"><span class="alert-content"><?php echo $item['content']; ?></span> - <span class="alert-date"><?php echo $item['date']; ?></span></p>
            <p class="alert-content"><span class="ip"><strong>IP: </strong><?php echo $item['loginip']; ?></span> <span class="os"><strong>OS: </strong><?php echo $item['loginos']; ?></span></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<style>
  .alert-item {
    border-left: 3px solid #0962B9;
    border-radius: 3px;
    padding-left: 5px;
    margin-bottom: 20px;
  }
</style>