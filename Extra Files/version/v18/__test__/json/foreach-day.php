<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../jquery.min.js"></script>
</head>
<body>
  <div class="content">

  </div>
</body>
</html>
<script>
  // Data
  var data = [
    {"day":"<?php echo date('D', strtotime('+0 day')); ?>","date":"<?php echo date('M.d', strtotime('+0 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+0 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+1 day')); ?>","date":"<?php echo date('M.d', strtotime('+1 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+1 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+2 day')); ?>","date":"<?php echo date('M.d', strtotime('+2 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+2 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+3 day')); ?>","date":"<?php echo date('M.d', strtotime('+3 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+3 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+4 day')); ?>","date":"<?php echo date('M.d', strtotime('+4 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+4 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+5 day')); ?>","date":"<?php echo date('M.d', strtotime('+5 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+5 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+6 day')); ?>","date":"<?php echo date('M.d', strtotime('+6 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+6 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+7 day')); ?>","date":"<?php echo date('M.d', strtotime('+7 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+7 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+8 day')); ?>","date":"<?php echo date('M.d', strtotime('+8 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+8 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+9 day')); ?>","date":"<?php echo date('M.d', strtotime('+9 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+9 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+10 day')); ?>","date":"<?php echo date('M.d', strtotime('+10 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+10 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+11 day')); ?>","date":"<?php echo date('M.d', strtotime('+11 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+11 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+12 day')); ?>","date":"<?php echo date('M.d', strtotime('+12 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+12 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+13 day')); ?>","date":"<?php echo date('M.d', strtotime('+13 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+13 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+14 day')); ?>","date":"<?php echo date('M.d', strtotime('+14 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+14 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+15 day')); ?>","date":"<?php echo date('M.d', strtotime('+15 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+15 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+16 day')); ?>","date":"<?php echo date('M.d', strtotime('+16 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+16 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+17 day')); ?>","date":"<?php echo date('M.d', strtotime('+17 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+17 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+18 day')); ?>","date":"<?php echo date('M.d', strtotime('+18 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+18 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+19 day')); ?>","date":"<?php echo date('M.d', strtotime('+19 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+19 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+20 day')); ?>","date":"<?php echo date('M.d', strtotime('+20 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+20 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+21 day')); ?>","date":"<?php echo date('M.d', strtotime('+21 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+21 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+22 day')); ?>","date":"<?php echo date('M.d', strtotime('+22 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+22 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+23 day')); ?>","date":"<?php echo date('M.d', strtotime('+23 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+23 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+24 day')); ?>","date":"<?php echo date('M.d', strtotime('+24 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+24 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+25 day')); ?>","date":"<?php echo date('M.d', strtotime('+25 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+25 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+26 day')); ?>","date":"<?php echo date('M.d', strtotime('+26 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+26 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+27 day')); ?>","date":"<?php echo date('M.d', strtotime('+27 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+27 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+28 day')); ?>","date":"<?php echo date('M.d', strtotime('+28 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+28 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+29 day')); ?>","date":"<?php echo date('M.d', strtotime('+29 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+29 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+30 day')); ?>","date":"<?php echo date('M.d', strtotime('+30 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+30 day')); ?>"},
    {"day":"<?php echo date('D', strtotime('+31 day')); ?>","date":"<?php echo date('M.d', strtotime('+31 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+31 day')); ?>"}
  ]

  // For each object
  data.forEach((e) => {
    $('.content').append(`
      <h2><span class="day">${e.day}</span>&nbsp;<span class="date">${e.date}</span></h2>
    `);
  });
</script>