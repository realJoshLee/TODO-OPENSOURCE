
/*
  ATP is the active test processing script used for the tasks app.
  
  Must be using JQuery for this to work.
  
  This was origionally designed to be used
  for the tasks app but this can be edited
  to use as needed for different projects.

  No documention will be provided on how to
  use this tool/script.

  Coded by Josh Lee 2021.
  madebyjoshlee.com
  hstly.net
*/

//  0 = Sundays
//  1 = Mondays
//  2 = Tuesdays
//  3 = Wednesdays
//  4 = Thursdays
//  5 = Fridays
//  6 = Saturdays

// Config settings
var atpDebug = 'false';
var atpformInputTask = 'input-quickadd';
var atpformInputDate = 'input-quickadd-date';

// Dates
var ATPtoday = new Date();
var ATPtomorrow = new Date(ATPtoday)
ATPtomorrow.setDate(ATPtomorrow.getDate() + 1)

// Today
var ATPTodayDD = String(ATPtoday.getDate()).padStart(2, '0');
var ATPTodayMM = ATPtoday.toLocaleString('default', { month: 'short' });
var ATPTodayYYYY = ATPtoday.getFullYear();

// Tomorrow
var ATPTmrDD = String(ATPtomorrow.getDate()).padStart(2, '0');
var ATPTmrMM = ATPtomorrow.toLocaleString('default', { month: 'short' });
var ATPTmrYYYY = ATPtomorrow.getFullYear();

// Does the active processing
$(`#${atpformInputTask}`).keyup(function() {
  // Preset Dates
  var today = ATPTodayMM + '-' + ATPTodayDD + '-' + ATPTodayYYYY;
  var tmr = ATPTmrMM + '-' + ATPTmrDD + '-' + ATPTmrYYYY;
  var tomorrow = ATPTmrMM + '-' + ATPTmrDD + '-' + ATPTmrYYYY;

  if(atpDebug=='true'){
    console.log('ATP - Form Keyup');
  }

  var input = $(`#${atpformInputTask}`).val();
  var inputdate = $(`#${atpformInputDate}`).val();

  var string = input









  // Looks for the date within the brackets
  if(string.match(/{([^}]+)}/)){
    // If there is a date within {}
    // Must be formatted {Nov-01-2021}

    var dateFound = string.match(/{([^}]+)}/)[1];

    // Replaces everything in the string
    var final = string.replace(/{([^}]+)}/,'');
    $(`#${atpformInputTask}`).val(`${final}`);

    // Replaces the date
    $(`#${atpformInputDate}`).val(dateFound);
  }









  // Looks for the folder within the hashes
  if(string.match(/#([^}]+)#/)){
    // If there is a date within {}
    // Must be formatted {Nov-01-2021}

    var folderFound = string.match(/#([^}]+)#/)[1];

    // Replaces everything in the string
    var final = string.replace(/#([^}]+)#/,'');
    $(`#${atpformInputTask}`).val(`${final}`);

    // Checks to make sure that the folder exists
    if($(`div.quickAddContainer-Inner .qaf-${folderFound}`).length > 0){
      // If it's a valid folder then it will select it.
      var folderVal = $(`.qaf-${folderFound}`).data("id")
      $(`#input-quickadd-folder`).val(folderVal);
      $(`#${atpformInputDate}`).val(``);
    }
  }









  // Triggers to look for within the string
  var ATPtriggers = [
    'today',
    'tmr','tomorrow',
    'sunday','sun',
    'mon','monday',
    'tue','tuesday',
    'wednesday','wed',
    'thur','thursday',
    'fri','friday',
    'saturday','sat',
    'inbox'
  ];

  ATPtriggers.forEach(ATPsearch);

  function ATPsearch(item, index) {
    // Index is the number
    // Item the the value
    
    if (string.indexOf(item) >= 0) {
      // Debug
      if(atpDebug=='true'){
        console.log(`ATP - "${item}" Found`);
      }
      
      // Removes today from the string
      var final = string.replace(`${item}`,'');

      // Updates the form
      $(`#${atpformInputTask}`).val(`${final}`);
      



      // Date replacements
      // For today
      if(item=='today'){
        $(`#${atpformInputDate}`).val(today);
      }
      
      // For tomorrow
      if(item=='tmr'||item=='tomorrow'){
        $(`#${atpformInputDate}`).val(tmr);
      }

      // For sunday
      if(item=='sun'||item=='sunday'){
        var d = new Date();
        d.setDate(d.getDate() + (((0 + 7 - d.getDay()) % 7) || 7));
        var DD = String(d.getDate()).padStart(2, '0');
        var MM = d.toLocaleString('default', { month: 'short' });
        var YY = d.getFullYear();
        var dateFull = MM+'-'+DD+'-'+YY;

        $(`#${atpformInputDate}`).val(dateFull);
      }

      // For monday
      if(item=='mon'||item=='monday'){
        var d = new Date();
        d.setDate(d.getDate() + (((1 + 7 - d.getDay()) % 7) || 7));
        var DD = String(d.getDate()).padStart(2, '0');
        var MM = d.toLocaleString('default', { month: 'short' });
        var YY = d.getFullYear();
        var dateFull = MM+'-'+DD+'-'+YY;

        $(`#${atpformInputDate}`).val(dateFull);
      }

      // For tuesday
      if(item=='tue'||item=='tuesday'){
        var d = new Date();
        d.setDate(d.getDate() + (((2 + 7 - d.getDay()) % 7) || 7));
        var DD = String(d.getDate()).padStart(2, '0');
        var MM = d.toLocaleString('default', { month: 'short' });
        var YY = d.getFullYear();
        var dateFull = MM+'-'+DD+'-'+YY;

        $(`#${atpformInputDate}`).val(dateFull);
      }

      // For wednesday
      if(item=='wed'||item=='wednesday'){
        var d = new Date();
        d.setDate(d.getDate() + (((3 + 7 - d.getDay()) % 7) || 7));
        var DD = String(d.getDate()).padStart(2, '0');
        var MM = d.toLocaleString('default', { month: 'short' });
        var YY = d.getFullYear();
        var dateFull = MM+'-'+DD+'-'+YY;

        $(`#${atpformInputDate}`).val(dateFull);
      }

      // For thursday
      if(item=='thur'||item=='thursday'){
        var d = new Date();
        d.setDate(d.getDate() + (((4 + 7 - d.getDay()) % 7) || 7));
        var DD = String(d.getDate()).padStart(2, '0');
        var MM = d.toLocaleString('default', { month: 'short' });
        var YY = d.getFullYear();
        var dateFull = MM+'-'+DD+'-'+YY;

        $(`#${atpformInputDate}`).val(dateFull);
      }

      // For friday
      if(item=='fri'||item=='friday'){
        var d = new Date();
        d.setDate(d.getDate() + (((5 + 7 - d.getDay()) % 7) || 7));
        var DD = String(d.getDate()).padStart(2, '0');
        var MM = d.toLocaleString('default', { month: 'short' });
        var YY = d.getFullYear();
        var dateFull = MM+'-'+DD+'-'+YY;

        $(`#${atpformInputDate}`).val(dateFull);
      }
      
      // For saturday
      if(item=='saturday'||item=='sat'){
        var d = new Date();
        d.setDate(d.getDate() + (((6 + 7 - d.getDay()) % 7) || 7));
        var DD = String(d.getDate()).padStart(2, '0');
        var MM = d.toLocaleString('default', { month: 'short' });
        var YY = d.getFullYear();
        var dateFull = MM+'-'+DD+'-'+YY;

        $(`#${atpformInputDate}`).val(dateFull);
      }
      
      // For inbox
      if(item=='inbox'){
        $(`#${atpformInputDate}`).val('inbox');
      }





    }
  }

});