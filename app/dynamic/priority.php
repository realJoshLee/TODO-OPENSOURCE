<?php
/*.dot {
  height: 10px;
  width: 10px;

  border-radius: 50%;

  display: inline-block;

  border: 2px solid #5297ff;
  background-color: #e9f0fc;
}
*/
// $priority = "2";

if($priority == "1") {
  ?>
  <style>
    .dot-<?php echo $item['id'];?> {
      height: 10px;
      width: 10px;
    
      border-radius: 50%;
    
      display: inline-block;
    
      border: 2px solid #ff0a43;
      background-color: #fac8d3;
    }
  </style>
  <?php
}
if($priority == "2") {
  ?>
  <style>
    .dot-<?php echo $item['id'];?> {
      height: 10px;
      width: 10px;
    
      border-radius: 50%;
    
      display: inline-block;
    
      border: 2px solid #ff9a24;
      background-color: #fae3c8;
    }
  </style>
  <?php
}
if($priority == "3") {
  ?>
  <style>
    .dot-<?php echo $item['id'];?> {
      height: 10px;
      width: 10px;

      border-radius: 50%;

      display: inline-block;

      border: 2px solid #5297ff;
      background-color: #e9f0fc;
    }
  </style>
  <?php
}
?>
<!--<span class="dot"></span>-->