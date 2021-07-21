<?php
  date_default_timezone_set('America/detroit');
?>
<!dOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>document</title>
  <script src="../jquery.min.js"></script>
</head>
<body>
  <div class="content">
    <div class="cal">
      <span class="button btn-today" data-quick="<?php echo date('M-d-Y', strtotime('+0 day')); ?>">Today</span>&nbsp;&nbsp;&nbsp;<span class="button" data-quick="inbox">Inbox</span><br>
      <p class="current-month"></p>

    </div>
    <style>
      html, body {
        padding-top: 100px;
        padding-left: 100px;
        font-family: Arial;
        font-size: 14px;
      }

      .button {
        background: #0962b9;
        color: #fff;
        padding-top: 3px;
        padding-bottom: 3px;
        padding-left: 6px;
        padding-right: 6px;
        border-radius: 5px;
      }

      .button:hover {
        opacity: 0.5;
        transition-duration: 0.2s;
        cursor: pointer;
      }

      .cal {
        background: #fcfcfc;
        width: 200px;
        height: auto;
        text-align: center;
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.39);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.39);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.39);
        
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 5px;
        padding-right: 5px;

        border-radius: 5px;
      }

      .cal-day {
        color: #111;
        border: 1px solid transparent;
        width: 20px;
        height: 20px;
        display: inline-block;
        margin: 2px;
        border-radius: 100px;
        padding-top: 2px;
      }

      .cal-day:hover{
        border: 1px solid #0962b9;
        background: #0962b9;
        color: #fff;
        cursor: pointer;
        opacity: 1;
        transition-duration: 0.2s;
      }

      .current-month {
        color: #0962b9;
        font-weight: bold;
        font-size: 20px;
      }
    </style>
  </div>
</body>
</html>
<script>
  // Current month and next month data
  var monthdata = [
    {"current":"<?php echo date('M', strtotime('+0 day')); ?>","next":"<?php echo date('M', strtotime('+31 day')); ?>","currentdate":"<?php echo date('M-d-Y', strtotime('+0 day')); ?>"}
  ]

  // 31 days ahead
  var data = [
    {"day":"<?php echo date('d', strtotime('+0 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+0 day')); ?>","month":"<?php echo date('M', strtotime('+0 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+1 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+1 day')); ?>","month":"<?php echo date('M', strtotime('+1 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+2 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+2 day')); ?>","month":"<?php echo date('M', strtotime('+2 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+3 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+3 day')); ?>","month":"<?php echo date('M', strtotime('+3 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+4 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+4 day')); ?>","month":"<?php echo date('M', strtotime('+4 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+5 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+5 day')); ?>","month":"<?php echo date('M', strtotime('+5 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+6 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+6 day')); ?>","month":"<?php echo date('M', strtotime('+6 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+7 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+7 day')); ?>","month":"<?php echo date('M', strtotime('+7 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+8 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+8 day')); ?>","month":"<?php echo date('M', strtotime('+8 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+9 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+9 day')); ?>","month":"<?php echo date('M', strtotime('+9 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+10 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+10 day')); ?>","month":"<?php echo date('M', strtotime('+10 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+11 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+11 day')); ?>","month":"<?php echo date('M', strtotime('+11 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+12 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+12 day')); ?>","month":"<?php echo date('M', strtotime('+12 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+13 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+13 day')); ?>","month":"<?php echo date('M', strtotime('+13 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+14 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+14 day')); ?>","month":"<?php echo date('M', strtotime('+14 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+15 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+15 day')); ?>","month":"<?php echo date('M', strtotime('+15 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+16 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+16 day')); ?>","month":"<?php echo date('M', strtotime('+16 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+17 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+17 day')); ?>","month":"<?php echo date('M', strtotime('+17 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+18 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+18 day')); ?>","month":"<?php echo date('M', strtotime('+18 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+19 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+19 day')); ?>","month":"<?php echo date('M', strtotime('+19 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+20 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+20 day')); ?>","month":"<?php echo date('M', strtotime('+20 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+21 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+21 day')); ?>","month":"<?php echo date('M', strtotime('+21 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+22 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+22 day')); ?>","month":"<?php echo date('M', strtotime('+22 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+23 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+23 day')); ?>","month":"<?php echo date('M', strtotime('+23 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+24 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+24 day')); ?>","month":"<?php echo date('M', strtotime('+24 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+25 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+25 day')); ?>","month":"<?php echo date('M', strtotime('+25 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+26 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+26 day')); ?>","month":"<?php echo date('M', strtotime('+26 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+27 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+27 day')); ?>","month":"<?php echo date('M', strtotime('+27 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+28 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+28 day')); ?>","month":"<?php echo date('M', strtotime('+28 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+29 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+29 day')); ?>","month":"<?php echo date('M', strtotime('+29 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+30 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+30 day')); ?>","month":"<?php echo date('M', strtotime('+30 day')); ?>"},
    {"day":"<?php echo date('d', strtotime('+31 day')); ?>","fulldate":"<?php echo date('M-d-Y', strtotime('+31 day')); ?>","month":"<?php echo date('M', strtotime('+31 day')); ?>"}
  ]

  // 31 day ahead data handeling
  data.forEach((e) => {
    $('.cal').append(`
      <div class="cal-day ${e.month}" data-full="${e.fulldate}">${e.day}</div>
    `);
  });

  // Current month data handeling
  monthdata.forEach((e) => {
    $('.cal').append(`
      <style>.${e.next}{opacity:0.7;}</style>
    `);
    $('.current-month').append(`
      ${e.current}
    `);
    $('.cal').append(`
      <style>.${e.next}{opacity:0.7;}</style>
    `);
  });

  $(document).on('click', '.cal-day', function(){
    var date = $(this).data('full');
    console.log(date);
  });

  $(document).on('click', '.button', function(){
    var date = $(this).data('quick');
    console.log(date);
  });
</script>