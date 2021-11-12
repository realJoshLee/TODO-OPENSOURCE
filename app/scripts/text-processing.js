var string = 'test three tmr dfsgsdfgsdfgs';

if (string.indexOf("today") >= 0) {
  var today = 'TODAY Found';

  // Today date
  var day = (new Date()).getDate();
  var year = (new Date()).getFullYear();
  var month = new Date()
  var monthshort = month.toLocaleString('default', { month: 'short' });
  var today = `${monthshort}-${day}-${year}`;

  // Removes today from the string
  var remove = string.replace('today ','');

  console.log(remove);
}

if (string.indexOf('tmr') >= 0) {
  var tomorrow = 'TMR Found';

  // Removes today from the string
  var remove = string.replace('tmr ','');

  console.log(remove);
}

if (string.indexOf('tomorrow') >= 0) {
  var tomorrow = 'TOMORROW Found';

  // Removes today from the string
  var remove = string.replace('tomorrow ','');

  console.log(remove);
}