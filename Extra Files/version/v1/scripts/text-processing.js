var string = 'test tmr dfsgsdfgsdfgs';

if (string.indexOf("today") >= 0) {
  // Today date
  var day = (new Date()).getDate();
  var year = (new Date()).getFullYear();
  var month = new Date()
  var monthshort = month.toLocaleString('default', { month: 'short' });
  var today = `${monthshort}-${day}-${year}`;

  // Removes today from the string
  var remove = string.replace('today ','');
}

if (string.indexOf('tmr') >= 0) {
  var tomorrow = '<?php echo $tomorrow; ?>';

  // Removes today from the string
  var remove = string.replace('tmr ','');
}

if (string.indexOf('tomorrow') >= 0) {
  var tomorrow = '<?php echo $tomorrow; ?>';

  // Removes today from the string
  var remove = string.replace('tomorrow ','');
}