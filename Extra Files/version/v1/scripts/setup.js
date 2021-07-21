$('.timezone').css('display','none');
$('.goal').css('display','none');

function timezone() {
  $('.theme').css('display','none');
  $('.timezone').css('display','initial');
  $('.goal').css('display','none');
}

$(document).on('submit', '#goalcontrol', function(event){
  $('.theme').css('display','none');
  $('.timezone').css('display','none');
  $('.goal').css('display','initial');

  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('#submit').attr('disabled', 'disabled');
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=updatetimezone`,
    method:"POST",
    data:$(this).serialize(),
  });
});

function finish() {
  $('.theme').css('display','none');
  $('.timezone').css('display','none');
  $('.goal').css('display','initial');

  var goal = document.getElementById('daily-goal').value;

  $.ajax({
    url: `sync/sync.php?as=dailygoalupdate&goal=${goal}`,
    method:"POST",
    data:$(this).serialize()
  });

  $.ajax({
    url: `sync/sync.php?as=setupdone`,
    data:$(this).serialize()
  });

  document.location.href = 'index.php';
}

function themelight() {
  $( ".theme-ctrl" ).removeClass('').addClass('light');
  $( ".theme-ctrl" ).removeClass('dark').addClass('');
  $( ".theme-ctrl" ).removeClass('black').addClass('');

  $.ajax({
    url: `sync/sync.php?as=theme&theme=light`,
    method:"POST",
    data:$(this).serialize()
  });
}

function themedark() {
  $( ".theme-ctrl" ).removeClass('light').addClass('');
  $( ".theme-ctrl" ).removeClass('').addClass('dark');
  $( ".theme-ctrl" ).removeClass('black').addClass('');

  $.ajax({
    url: `sync/sync.php?as=theme&theme=dark`,
    method:"POST",
    data:$(this).serialize(),
  })
}

function themeblack() {
  $( ".theme-ctrl" ).removeClass('light').addClass('');
  $( ".theme-ctrl" ).removeClass('dark').addClass('');
  $( ".theme-ctrl" ).removeClass('').addClass('black');
  
  $.ajax({
    url: `sync/sync.php?as=theme&theme=black`,
    method:"POST",
    data:$(this).serialize(),
  })
}