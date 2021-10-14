/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    SCREEN LOADER
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
var devmode = 'true'; // set to true or false
var offlinecheck = 'true'; // checks client to see if they are offline of online.

// Show the loader when in production.
if(devmode=='false'){
  // Hides all of the page content and keeps the loader visible.
  $('.all-content').css('display','none');

  // Shows all of the content and hides the loader after 1 second.
  setTimeout(() => { 
    $('.loader').css('display','none');
    $('.all-content').css('display','initial');
  }, 1500);
}

// Disables the load time for devs
if(devmode=='true'){
  $('.loader').css('display','none');
  $('.all-content').css('display','initial');
}

/*if('serviceWorker' in navigator){
  window.addEventListener('load', () => {
    navigator.serviceWorker
      .register('scripts/sw.js')
      .then(reg => console.log('Service worker regiered.'))
      .catch(err => console.log(`Service worker error: ${err}`))
  })
}*/

if(offlinecheck=='true'){
  window.addEventListener("offline", (event) => {
    console.log('%c Network - Offline.', 'color: red');
    $('.all-content').css('display','none');
    $('.offline-display').css('display','initial');
  });

  window.addEventListener("online", (event) => {
    console.log('%c Network - Online.', 'color: green');
    $('.all-content').css('display','initial');
    $('.offline-display').css('display','none');
  });
}



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    PULL TO REFRESH
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
// Pull to refresh function for the app/mobile 
/*PullToRefresh.init({
  mainElement: '#page-nav-content',
  onRefresh: function(){ window.location.reload(); }
});*/



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    RESIZE FOR NAV
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
window.onresize = resize;
function resize() {
  if ($(window).width() >= 830) {
    opennavdesktop();
  }
  if ($(window).width() <= 830) {
    closenav();
  }
}



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    SHORTCUTS
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
document.onkeydown = function(e) {
  // Closes the overlay when you press escape
  // ESC
  if (e.which == 27) {
    $(`[id^=overlay-]`).css('display','none');
  }

  // ALT+1
  if (e.altKey && e.which == 49) {
    inboxactive();
  }

  // ALT+2
  if (e.altKey && e.which == 50) {
    todayactive();
  }

  // ALT+3
  if (e.altKey && e.which == 51) {
    planningactive();
  }

  // ALT+4
  if (e.altKey && e.which == 52) {
    linksactive();
  }

  // ALT+5
  if (e.altKey && e.which == 53) {
    statsactive();
  }

  // ALT+6
  if (e.altKey && e.which == 54) {
    settingsactive();
  }

  // ALT+8
  if (e.altKey && e.which == 56) {
    alertsactive();
  }

  // ALT+9
  if (e.altKey && e.which == 57) {
    window.location.href = 'log.php';
  }

  // Closes side nav on desktop
  // ALT+M
  if (e.altKey && e.which == 77) {
    closenav();
  }

  // Opens side nav on desktop
  // ALT+B
  if (e.altKey && e.which == 66) {
    opennavdesktop();
  }  

  // Navigates to the input page and focuses on the input container.
  // ALT+Q
  if (e.altKey && e.which == 81) {
    inboxactive();
    $('#input-inbox').focus();
  }  

  // Navigates to the planning page and focuses on the today input container.
  // ALT+W
  if (e.altKey && e.which == 87) {
    planningactive();
    $('.today-current-input').focus();
  }  

  // Navigates to the planning page and focuses on the tomorrow input container.
  // ALT+R
  if (e.altKey && e.which == 82) {
    planningactive();
    $('.tomorrow-current-input').focus();
  }  
};


















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    NAVIGATION
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
$('.default-hide').css('display','none');
$('[id^=fdiv-]').css('display','none');

count();

// Where it send the user if they have the hash in the status bar.
if(location.hash=='#links'){
  linksactive();
}
if(location.hash=='#planning'){
  planningactive();
}
if(location.hash=='#quickadd'){
  quickaddactive();
}
if(location.hash=='#inbox'){
  inboxactive();
}
if(location.hash=='#settings'){
  settingsactive();
}
if(location.hash=='#stats'){
  statsactive();
}
if(location.hash=='#alerts'){
  alertsactive();
}
if(location.hash=='#today'){
  todayactive();
}

var doctitle = 'Tasks';

// Makes the today view active
function todayactive() {
  // Header info
  location.hash = 'today';
  document.title = `Today: Tasks`;

  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $('.insight-page').css('display','initial');
  $( ".today-nav" ).removeClass('').addClass('active');
  $('.all-other-days').css('display','none');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// Makes the today view active
function quickaddactive() {
  // Header info
  location.hash = 'quickadd';
  document.title = `Quick Add: Tasks`;

  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $('.quickadd-page').css('display','initial');
  $( ".quickadd-page" ).removeClass('').addClass('active');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// Makes the links view active
function linksactive() {
  // Header info
  location.hash = 'links';
  document.title = `Links: Tasks`;

  $('.app-page').css('display','none');
  $('.nav-btn-container').removeClass('active').addClass('');
  
  // Changes the view
  $('.links-page').css('display','initial');
  $('.links-nav').removeClass('').addClass('active');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// Makes the today view active
function statsactive() {
  // Header info
  location.hash = 'stats';
  document.title = `Stats: Tasks`;

  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $('.stats-page').css('display','initial');
  $( `.stats-nav` ).removeClass('').addClass('active');
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// Makes the planning view active
function planningactive() {
  // Header info
  location.hash = 'planning';
  document.title = `Planning: Tasks`;

  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $('.insight-page').css('display','initial');
  $( ".planning-nav" ).removeClass('').addClass('active');
  $('.all-other-days').css('display','initial');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// Makes the inbox view active
function inboxactive() {
  // Header info
  location.hash = 'inbox';
  document.title = `Inbox: Tasks`;

  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');
  
  // Changes the view
  $('.inbox-page').css('display','initial');
  $( ".inbox-nav" ).removeClass('').addClass('active');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// Makes the inbox view active
function logactive() {
  // Header info
  location.hash = 'log';
  document.title = `Log: Tasks`;
  window.location.href = 'log.php';
}

// Opens the folder
$(document).on('click', '.folder-btn', function(){
  var fid = $(this).data('id');

  // Header info
  location.hash = `fid-${fid}`;
  document.title = `Folder: Tasks`;
  
  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $(`#fdiv-${fid}`).css('display','initial');
  $( `#f-${fid}` ).removeClass('').addClass('active');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
});

// Makes the today view active
function alertsactive() {
  // Header info
  location.hash = 'alerts';
  document.title = `Alerts: Tasks`;

  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $('.alerts-page').css('display','initial');
  //$( `.alerts-nav` ).removeClass('').addClass('active');
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// For the location hash reguarding folders
if(window.location.hash.includes('fid-')){
  function getSecondPart(str) {
    return str.split('-')[1];
  }
  // use the function:
  var fid = getSecondPart(window.location.hash);

  // Header info
  location.hash = `fid-${fid}`;
  document.title = `Folder: Tasks`;
  
  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $(`#fdiv-${fid}`).css('display','initial');
  $( `#f-${fid}` ).removeClass('').addClass('active');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}

// Makes the settings view active
function settingsactive() {
  // Header info
  location.hash = 'settings';
  document.title = `Settings: Tasks`;
  
  // Changes the view
  $('.app-page').css('display','none');
  $( ".nav-btn-container" ).removeClass('active').addClass('');

  $('.settings-page').css('display','initial');
  $( `.settings-btn` ).removeClass('').addClass('active');
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
}



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    SIDENAV CONTROL
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
// Opens the nav on smaller screens
function opennavdesktop() {
  $('.left').fadeIn(200);
  $('.nav-desktop-page').css('display','none');

  // Main task alignment
  $('.right').css('padding-left','270px');
}

// Opens the nav on smaller screens
function opennav() {
  $('.left').fadeIn(200);
  $('.right').fadeOut(200);
}

// Closes the side nav
function closenav() {
  $('.left').fadeOut(200);
  $('.right').fadeIn(200);

  // Main task alignment
  $('.right').css('padding-left','0');

  if ($(window).width() > 830) {
    setTimeout(() => {
      $('.nav-desktop-page').css('display','initial');
    }, 100);
  }
}

// PT1 and PT2 for task overlay
$(document).on('click', '.partctrl', function(){
  var id = $(this).data('id');
  var part = $(this).data('part');

  if(`${part}`=='pt1'){
    $(`.pt1-${id}`).css('display','initial');
    $(`.pt2-${id}`).css('display','none');
    $(`#pt1-${id}`).addClass('taskolpg-active');
    $(`#pt2-${id}`).removeClass('taskolpg-active');
  }

  if(`${part}`=='pt2'){
    $(`.pt2-${id}`).css('display','initial');
    $(`.pt1-${id}`).css('display','none');
    $(`#pt2-${id}`).addClass('taskolpg-active');
    $(`#pt1-${id}`).removeClass('taskolpg-active');
  }
});

// Folders toggle
function getCookie(cname) {
  const cookies = Object.fromEntries(
    document.cookie.split(/; /).map(c => {
      const [key, v] = c.split('=', 2);
      return [key, decodeURIComponent(v)];
    }),
  );
  return cookies[cname] || '';
}
var toggleStatus = getCookie('toggleStatus');
var cookiePreset = document.cookie.match(/^(.*;)?\s*toggleStatus\s*=\s*[^;]+(.*)?$/)

// Checks to see if the token exists
if(cookiePreset == null){
  // Creates the cookie if there isn't a cookie already created
  document.cookie = "toggleStatus=Open";

  // After the cookie is created it sets the default action (open)
  opentoggle();
}else{
  // If the token is created, it determines if it should open or close the toggle
  if(toggleStatus=='Open'){
    opentoggle();
  }
  if(toggleStatus=='Close'){
    closetoggle();
  }
}

// Handles the button click for closing the toggle list
$(document).on('click', '.folders-collapse', function(){
  closetoggle();
});

// Handles the button click for opening the toggle list
$(document).on('click', '.folders-expand', function(){
  opentoggle();
});

// Actions for opening the toggle list
function opentoggle(){
  // Opens the folder
  $(`.folder-show-ctrl`).css('display','initial');

  // Handles what icons show next to the folder text
  $(`.folders-collapse`).css('display','initial');
  $(`.folders-expand`).css('display','none');

  // Updates the cookie
  document.cookie = "toggleStatus=Open";
}

// Actions for closing the toggle list
function closetoggle(){
  // Closes the folder
  $(`.folder-show-ctrl`).css('display','none');

  // Handles what icons show next to the folder text
  $(`.folders-collapse`).css('display','none');
  $(`.folders-expand`).css('display','initial');

  // Updates the cookie
  document.cookie = "toggleStatus=Close";
}



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    DRAG ITEMS
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
(function(){
	if(
		!document.querySelectorAll 
		|| 
		!('draggable' in document.createElement('span')) 
		|| 
		window.opera
	) 
  { return; }
	
	for(var 
		items = document.querySelectorAll('[data-draggable="item"]'), 
		len = items.length, 
		i = 0; i < len; i ++){
		items[i].setAttribute('draggable', 'true');
  }
  
  var item = null;
  
	document.addEventListener('dragstart', function(e){
		item = e.target;
    e.dataTransfer.setData('text', '');
    //console.log('start');

    //$('.task-container').css('border','1px solid grey');
    $( `.task-container` ).removeClass('').addClass('drag-show');
	}, false);

	document.addEventListener('dragover', function(e){
		if(item){
			e.preventDefault();
		}
	}, false);	

	document.addEventListener('drop', function(e){
		if(e.target.getAttribute('data-draggable') == 'target'){
			e.target.appendChild(item);	
      e.preventDefault();
      
      var tid = $(item).data('id');
      var date = $(e.target).attr('id');
      //console.log('drop');
            
      // Sends everything to the add_task page for it to be added to the db
      $.ajax({
        url: `sync/sync.php?as=updatedatedrag`,
        method:"POST",
        data:{
          'tid': `${tid}`,
          'date': `${date}`
        },
      })

      // For the alert
      $('.alert-taskmove').fadeIn(100);
      setTimeout(() => { 
        $('.alert-taskmove').fadeOut(100);
      }, 1500);
		}
	}, false);
	
	document.addEventListener('dragend', function(e){
		item = null;
    //console.log('end');

    //$('.task-container').css('border','none');
    $( `.task-container` ).removeClass('drag-show').addClass('');
	}, false);
})();	



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    EDIT CONTAINER CONTROLS
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
// Opens the overlay
$(document).on('click', '.task-right', function(){
  var overlayid = $(this).data('id');
  $(`#overlay-${overlayid}`).css('display','block');
});

// Closes the overlay 
$(document).on('click', '.overlay-close', function(){
  var overlayid = $(this).data('id');
  $(`#overlay-${overlayid}`).css('display','none');

  $(`.pt2-${overlayid}`).css('display','initial');
  $(`.pt1-${overlayid}`).css('display','none');
  $(`#pt2-${overlayid}`).addClass('taskolpg-active');
  $(`#pt1-${overlayid}`).removeClass('taskolpg-active');
});

// Opens the add folder box 
function folderaddopen() {
  $(`.folder-add-form`).css('display','initial');
  $(`.folder-add-icon, .folder-add-btn`).css('display','none');
  $(`#folder-input`).focus();
  opentoggle();
}

// Closes the folder
function folderaddclose() {
  $(`.folder-add-form`).css('display','none');
  $(`.folder-add-icon, .folder-add-btn`).css('display','initial');
}

// Closes the folder edit container
$('.folder-edit-container').css('display','none');

// Opens the folder edit container
$(document).on('click', '.edit-folder-content', function(){
  var id = $(this).data('id');
  $(`.fec-${id}`).css('display','initial');
});

// Closes the folder edit container
$(document).on('click', '.edit-folder-close', function(){
  var id = $(this).data('id');
  $(`.folder-edit-container`).css('display','none');
});



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    TASK EXTRAS CONTROL
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
// Gets the task counts for planning and inbox page
function count() {
  // Count inbox and planning main tasks
  var planningct = $('.insight-page .task-main').length;
  var inboxct = $('.inbox-page .task-main').length;
  var todayct = $('.today-container .task-main').length;
  var linksct = $('.links-page .task-main').length;
  document.getElementById("planningtasksct").innerHTML = `${planningct}`;
  document.getElementById("inboxtasksct").innerHTML = `${inboxct}`;
  document.getElementById("todaytaskct").innerHTML = `${todayct}`;
  document.getElementById("linksct").innerHTML = `${linksct}`;

  // Count subtasks
  $('.task-main').map(function(){
    var id = $(this).data('id');
    
    if($(`div.subtasks-${id} .task`).length > 0){
      document.getElementById(`count-${id}`).innerHTML = '<span class="count"><i class="fas fa-check-double"></i>&nbsp;</span>';
    }else{
      document.getElementById(`count-${id}`).innerHTML = '';
    }
  }).get();
  
  // Gets notes value
  $('.task-main .ol-notes-form').map(function(){
    var id = $(this).data('id');
    
    var val = $(`#ol-notes-${id}`).val();
    if(val==''){
      document.getElementById(`notesnoti-${id}`).innerHTML = '';
    }else{
      document.getElementById(`notesnoti-${id}`).innerHTML = '<span class="count"><i class="far fa-sticky-note"></i>&nbsp;&nbsp;</span>';
    }
  }).get();
  
  // Get reminders value
  $('.task-main .task-reminderdate-form').map(function(){
    var id = $(this).data('id');
    
    var val = $(`#reminderdate-${id}`).val();
    if(val==''){
      
    }else{
      document.getElementById(`remindernoti-${id}`).innerHTML = '<span class="count"><i class="far fa-clock"></i>&nbsp;&nbsp;</span>';
    }
  }).get();

  // Count tasks in a folder
  $('.folder-nav-container').map(function(){
    var id = $(this).data('id');
    
    document.getElementById(`fct-${id}`).innerHTML = $(`div#fdiv-${id} .task-main`).length;
    
    var folderal = $(`div#fdiv-${id} .task-date:contains(${todaydate})`).length;
    if(parseInt(folderal) > 0) {
      $(`#fct-${id}`).addClass('duetodayalert');
    }else{
      $(`#fct-${id}`).removeClass('duetodayalert');
    }
  }).get();
}

$(document).on('click', '.outline', function(event){
  // Gets the task id
  var id = $(this).data('id');

  // Handles what heart shows in the task overlay
  $(`.outline-container`).css('display','none');
  $(`.full-container`).css('display','initial');

  // Places the heart in the container
  $(`.heart-${id}`).html('<span class="full"><i class="fas fa-heart"></i>&nbsp;</span>');

  // Sends the request to the server
  $.ajax({
    url: `sync/sync.php?as=favorite`,
    type:'POST',
    data: {
      'value': `true`,
      'id': `${id}`
    },
  })
});

$(document).on('click', '.full', function(event){
  // Gets the task id
  var id = $(this).data('id');

  // Handles what heart shows in the task overlay
  $(`.outline-container`).css('display','initial');
  $(`.full-container`).css('display','none');

  // Removes the heart from the container
  $(`.heart-${id}`).html('');

  // Sends the request to the server
  $.ajax({
    url: `sync/sync.php?as=favorite`,
    type:'POST',
    data: {
      'value': `false`,
      'id': `${id}`
    },
  })
});



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    CONTENT UPDATE SCRIPTS
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
// To save the contents of the tasks from the overlay
$(document).on('click', '.task-save-btn', function(){
  // Gets the task id
  var tid = $(this).data('id');
  
  // Gets the task value and syncs it with the one displayed on the page
  var taskvalue = document.getElementById(`ol-task-${tid}`).innerHTML;
  document.getElementById(`pv-task-${tid}`).innerHTML = taskvalue;

  // Sync the request with the database
  $.ajax({
    url: `sync/sync.php?as=updatetask`,
    method:"POST",
    data:{
      'task': `${taskvalue}`,
      'tid': `${tid}`
    }
  })
});

// Update reminder status
$(document).on('submit', '.reminderstatus', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('.submit').attr('disabled', 'disabled');
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=reminderupdate`,
    method:"POST",
    data:$(this).serialize(),
  })
});

// Update background sync status
$(document).on('submit', '.backgroundsyncform', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('.submit').attr('disabled', 'disabled');
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=backgroundsyncupdate`,
    method:"POST",
    data:$(this).serialize(),
  })

  var form = $(`#bgsyncval`).val();
  if(`${form}`=='false'){
    clearInterval(datasync);
  }
});

// Update identifier status
$(document).on('submit', '.extensionaddform', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('.submit').attr('disabled', 'disabled');
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=extensionaddformupdate`,
    method:"POST",
    data:$(this).serialize(),
  })
});

// To save the contents of the notes from the overlay
$(document).on('submit', '.ol-notes-form', function(event){
  // Gets the task id from the note container
  var tid = $(this).data('id');

  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('#submit').attr('disabled', 'disabled');

  // Gets the note var
  var notevar = document.getElementById(`ol-notes-${tid}`).value;
  
  // Send everything to the server
  /*$.ajax({
    url: `sync/sync.php?as=updatenotes&tid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
  })*/

  $.ajax({
    url: `sync/sync.php?as=updatenotes`,
    method:"POST",
    data:{
      'tid': `${tid}`,
      'notes': `${notevar}`
    }
  })

  count();
});

// Delets the task
$(document).on('click', '.task-del-btn', function(){
  // Gets the task id
  var tid = $(this).data('id');
  $(`.task-${tid}`).fadeOut(100);
  $(`.task-${tid}`).remove();

  // Sync the request with the database
  $.ajax({
    url: `sync/sync.php?as=deltask`,
    method:"POST",
    data:{
      'tid': `${tid}`
    }
  })

  count();
});

// Marks the task as compelte
$(document).on('click', '.task-complete-btn', function(){
  // Gets the task id
  var tid = $(this).data('id');

  $(`.task-${tid}`).css({'background-color':'#bbd2f0', 'opacity':'0.5'});
  $(`.task-${tid} .dot`).css({'background':'#0962b9', 'color':'#fff', 'border':'2px solid #0962b9'});
  $(`.task-${tid}`).fadeOut(100);
  $(`.task-${tid}`).remove();
  /*setTimeout(function() {
    $(`.task-${tid}`).fadeOut(100);
    $(`.task-${tid}`).remove();

    count();
  }, 1000);*/
  
  count();

  var counter = $("#counter");
  counter.html( parseInt(counter.html()) + 1 );

  // Sync the request with the database
  $.ajax({
    url: `sync/sync.php?as=completetask`,
    method:"POST",
    data:{
      'tid': `${tid}`
    }
  })

  // For the alert
  $('.alert-taskcomplete').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskcomplete').fadeOut(100);
  }, 1500);
});

// Updates the date
$(document).on('click', 'div.insight-page .task-save-date', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  
  var datevar = document.getElementById(`date-${tid}`).value;
  $(`.task-${tid}`).appendTo(`#${datevar}`);
  $("[id^=overlay-]").css('display','none');
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=updatedate`,
    method:"POST",
    data:{
      'tid': `${tid}`,
      'date': `${datevar}`
    }
  })

  count();

  // For the alert
  $('.alert-taskmove').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskmove').fadeOut(100);
  }, 1500);
});

// Updates the reminder date
$(document).on('submit', '.task-reminderdate-form', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  
  var datevar = document.getElementById(`reminderdate-${tid}`).value;
  document.getElementById(`remindernoti-${tid}`).innerHTML = '<span class="count"><i class="far fa-clock"></i>&nbsp;&nbsp;</span>';

  if(datevar==''){
    document.getElementById(`remindernoti-${tid}`).innerHTML = '';
  }
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=reminderupdatedate`,
    method:"POST",
    data:$(this).serialize()+`&tid=${tid}`,
  })

  // For the alert
  $('.alert-taskreminder').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskreminder').fadeOut(100);
  }, 1500);
});

// Removed the reminder date
$(document).on('click', '.remove-reminder-date', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  document.getElementById(`reminderdate-${tid}`).value = '';
  document.getElementById(`remindernoti-${tid}`).innerHTML = '';
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=reminderremovedate`,
    method:"POST",
    data:{
      'tid': `${tid}`
    }
  })

  // For the alert
  $('.alert-taskreminder').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskreminder').fadeOut(100);
  }, 1500);
});

// Updates the date
$(document).on('click', 'div.inbox-page .task-save-date', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  
  var datevar = document.getElementById(`date-${tid}`).value;
  $(`.task-${tid}`).appendTo(`#${datevar}`);
  $("[id^=overlay-]").css('display','none');
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=updatedate`,
    method:"POST",
    data:{
      'tid': `${tid}`,
      'date': `${datevar}`
    }
  })

  count();

  // For the alert
  $('.alert-taskmove').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskmove').fadeOut(100);
  }, 1500);
});

// Updates the date
$(document).on('click', 'div.folderlist .task-save-date', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  
  var datevar = document.getElementById(`date-${tid}`).value;
  document.getElementById(`td-${tid}`).innerHTML=`<span class="task-date">${datevar}</span>`;
  if(document.getElementById(`td-${tid}`).innerHTML==''){
    document.getElementById(`td-${tid}`).innerHTML=``;
  }
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=updatedate`,
    method:"POST",
    data:{
      'tid': `${tid}`,
      'date': `${datevar}`
    }
  })

  count();

  // For the alert
  $('.alert-taskmove').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskmove').fadeOut(100);
  }, 1500);
});

// Updates the date
$(document).on('click', 'div.folderlist .remove-from-folder', function(event){
  var tid = $(this).data('id');

  document.getElementById(`date-${tid}`).innerHTML=`inbox`;
  document.getElementById(`td-${tid}`).innerHTML=``;
  $(`.task-${tid}`).appendTo(`#inbox`);
  $("[id^=overlay-]").css('display','none');
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=removefromfolder`,
    method:"POST",
    data:{
      'tid': `${tid}`
    }
  })

  count();
});

// Updates the content of the subtasks
$('.task-edit').keyup(function(){
  var tid = $(this).data('id');
  var content = document.getElementById(`pv-task-${tid}`).innerHTML;

  $.ajax({
    url: `sync/sync.php?as=subtaskupdate`,
    method:"POST",
    data:{
      'id': `${tid}`,
      'content': `${content}`
    },
  })

  count();
});

// Deletes the folder
$(document).on('click', '.delete-folder', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  
  planningactive();
  $(`.fnav-${tid}, #fdiv-${tid}`).remove();
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=deletefolder`,
    method:"POST",
    data:{
      'fid': `${tid}`
    }
  })

  count();

  // For the alert
  $('.alert-taskdel').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskdel').fadeOut(100);
  }, 1500);
});

// To save the contents of the notes from the overlay
$(document).on('submit', '.folder-settings-edit', function(event){
  var fid = $(this).data('id');

  // Stops the form from refreshing the page
  event.preventDefault();
  $('.submit').attr('disabled', 'disabled');
  var content = document.getElementById(`fnb-${fid}`).value;
  document.getElementById(`fn-${fid}`).innerHTML = `${content}`;
  document.getElementById(`fcontent-${fid}`).innerHTML = `${content}`;
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=fnameupdate`,
    method:"POST",
    data:$(this).serialize()+`&fid=${fid}`,
  })
});

// To save the contents of the notes from the overlay
$(document).on('click', '.folder-color-savebtn', function(event){
  var fid = $(this).data('id');

  // Stops the form from refreshing the page
  /*event.preventDefault();
  $('.submit').attr('disabled', 'disabled');*/
  var content = document.getElementById(`fcolor-${fid}`).value;

  document.getElementById(`ficon-${fid}`).innerHTML = `<img src="icons/colored-folder-icons/folder-${content}.svg" alt="" class="nav-icon">`;
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=fcolorupdate`,
    method:"POST",
    data:{
      'id': `${fid}`,
      'color': `${content}`
    },
  })
});

// To save the contents of the notes from the overlay
$(document).on('click', '.folder-share-savebtn', function(event){
  var fid = $(this).data('id');

  // Stops the form from refreshing the page
  /*event.preventDefault();
  $('.submit').attr('disabled', 'disabled');*/
  var shareone = document.getElementById(`fshareone-${fid}`).value;
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=fshare`,
    method:"POST",
    data:{
      'id': `${fid}`,
      'sharedone': `${shareone}`
    },
  })
});

// Updates the timezone
$(document).on('submit', '#timezone-form', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('.submit').attr('disabled', 'disabled');
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=updatetimezone`,
    method:"POST",
    data:$(this).serialize(),
  })
});

// Updates the timezone
$(document).on('submit', '#name-form', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('.submit').attr('disabled', 'disabled');
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=updateaccname`,
    method:"POST",
    data:$(this).serialize(),
  })
});

// Enables/disables sharing
$(document).on('click', '.share-btn', function(event){
  var tid = $(this).data('id');
  var share = $(this).data('share');

  $.ajax({
    url: `sync/sync.php?as=share`,
    method:"POST",
    data:{
      'id': `${tid}`,
      'share': `${share}`
    },
  })
});

$(document).on('click', '.remove-date', function(event){
  var tid = $(this).data('id');
  document.getElementById(`td-${tid}`).innerHTML = '';
  $(`#date-${tid}`).val("inbox");
  $(`.task-${tid}`).appendTo(`#inbox`);

  $.ajax({
    url: `sync/sync.php?as=removedate`,
    method:"POST",
    data:{
      'id': `${tid}`
    },
  })

  count();
});



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    ADDING SCRIPTS
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
// Adding subtasks to a task
$(document).on('submit', '.subtasks-form', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();

  // Gemerates a random taskid code
  var subtaskid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150);

  // Adds everything to the div
  var taskvar = document.getElementById(`sti-${tid}`).value;
  $(`.subtasks-${tid}`).append( `
    <?php include('dynamic/subtask-list.php'); ?>
  ` );
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=addsubtask`,
    method:"POST",
    data:$(this).serialize()+`&id=${subtaskid}`+`&ptid=${tid}`,
  })

  count();

  // Clears the form
  $(`#sbf-${tid}`)[0].reset();
});

// Handles adding of the tasks for the inbox and planning page
$(document).on('submit', '.task-sub-form', function(event){
  var date = $(this).data('id');

  // Stops the form from refreshing the page
  event.preventDefault();

  // Gemerates a random taskid code
  var taskid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150);

  // Adds everything to the div
  var taskvar = document.getElementById(`input-${date}`).value;
  $( `#${date}` ).append( `
    <?php include('dynamic/task-list-add.php'); ?>
  ` );
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=addtask`,
    type:'POST',
    data:$(this).serialize()+`&id=${taskid}`+`&day=${date}`
  })

  // Clears the form and counts the tasks
  $(`#form-${date}`)[0].reset();
  count();
});

// Add folder code.
$(document).on('submit', '.folder-add-form', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Gemerates a random taskid code
  var fid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150);

  // Adds everything to the div
  var foldervar = document.getElementById(`folder-input`).value;
  $( `.folder-btns` ).prepend( `
    <?php include('dynamic/folder-from-js.php'); ?>
  ` );

  $( `.folder-container-page` ).append( `
    <?php include('dynamic/folder-list-add.php'); ?>
  ` );
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=addfolder`,
    method:"POST",
    data:$(this).serialize()+`&id=${fid}`,
  })

  // Extra functions. (resets form, closes the folder edit container, and counts the tasks.)
  $(`.folder-add-form`)[0].reset();
  $('[id^=fdiv-], .folder-edit-container').css('display','none');  
  folderaddclose();
  count();
});

// Code that handles when a user adds a task to a folder.
$(document).on('submit', '.folderform', function(event){
  var fid = $(this).data('id');

  // Stops the form from refreshing the page
  event.preventDefault();

  // Gemerates a random taskid code
  var taskid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150);

  // Adds everything to the div
  var taskvar = document.getElementById(`finput-${fid}`).value;
  var date = '-';
  $( `#ftl-${fid}` ).append( `
    <?php include('dynamic/task-list-add.php'); ?>
  ` );
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=addtasktofolder`,
    method:"POST",
    data:$(this).serialize()+`&tid=${taskid}`+`&fid=${fid}`,
  })

  // Clears the form and counts the tasks.
  $(`.ff-${fid}`)[0].reset();
  count();
});



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    THEME CONTROL
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
// Light theme
function themelight() {
  $( ".theme-ctrl" ).removeClass('theme_dark theme_black theme_blacksolid').addClass('theme_light');

  $( ".darktgl, .blacktgl, .blacksolidtgl" ).removeClass('activetoggle').addClass('');
  $( ".lighttgl" ).removeClass('').addClass('activetoggle');

  $.ajax({
    url: `sync/sync.php?as=theme`,
    type:'POST',
    data: {
      'theme': `light`
    },
  })
}

// Dark theme
function themedark() {
  $( ".theme-ctrl" ).removeClass('theme_light theme_black theme_blacksolid').addClass('theme_dark');

  $( ".lighttgl, .blacktgl, .blacksolidtgl" ).removeClass('activetoggle').addClass('');
  $( ".darktgl" ).removeClass('').addClass('activetoggle');

  $.ajax({
    url: `sync/sync.php?as=theme`,
    type:'POST',
    data: {
      'theme': `dark`
    },
  })
}

// Black theme
function themeblack() {
  $( ".theme-ctrl" ).removeClass('theme_light theme_dark theme_blacksolid').addClass('theme_black');

  $( ".lighttgl, .darktgl, .blacksolidtgl" ).removeClass('activetoggle').addClass('');
  $( ".blacktgl" ).removeClass('').addClass('activetoggle');
  
  $.ajax({
    url: `sync/sync.php?as=theme`,
    type:'POST',
    data: {
      'theme': `black`
    },
  })
}

// Black solid theme
function theme_solid_black() {
  $( ".theme-ctrl" ).removeClass('theme_light theme_dark theme_black').addClass('theme_blacksolid');

  $( ".lighttgl, .darktgl, .blacktgl" ).removeClass('activetoggle').addClass('');
  $( ".blacksolidtgl" ).removeClass('').addClass('activetoggle');
  
  $.ajax({
    url: `sync/sync.php?as=theme`,
    type:'POST',
    data: {
      'theme': `blacksolid`
    },
  })
}

if(`${backgroundsyncen}`=='true'){
  var datasync = window.setInterval(function(){
    // Theme sync data
    $.ajax({
      url: `sync/sync.php?as=gettheme`,
      type:'POST',
      data: {
      },
      success:function(data) {
        var theme = $('html').hasClass(`${data}`);

        // If theme has been changed
        if(`${theme}`=='false'){

          // What happens if the theme is light
          if(`${data}`=='theme_light'){
            $( ".theme-ctrl" ).removeClass('theme_dark theme_black theme_blacksolid').addClass('theme_light');
            $( ".darktgl, .blacktgl, .blacksolidtgl" ).removeClass('activetoggle').addClass('');
            $( ".lighttgl" ).removeClass('').addClass('activetoggle');
          }

          // What happens if the theme is dark
          if(`${data}`=='theme_dark'){
            $( ".theme-ctrl" ).removeClass('theme_light theme_black theme_blacksolid').addClass('theme_dark');
            $( ".lighttgl, .blacktgl, .blacksolidtgl" ).removeClass('activetoggle').addClass('');
            $( ".darktgl" ).removeClass('').addClass('activetoggle');
          }

          // What happens if the theme is black
          if(`${data}`=='theme_black'){
            $( ".theme-ctrl" ).removeClass('theme_light theme_dark theme_blacksolid').addClass('theme_black');
            $( ".lighttgl, .darktgl, .blacksolidtgl" ).removeClass('activetoggle').addClass('');
            $( ".blacktgl" ).removeClass('').addClass('activetoggle');
          }

          // What happens if the theme is black solid
          if(`${data}`=='theme_blacksolid'){
            $( ".theme-ctrl" ).removeClass('theme_light theme_dark theme_black').addClass('theme_blacksolid');
            $( ".lighttgl, .darktgl, .blacktgl" ).removeClass('activetoggle').addClass('');
            $( ".blacksolidtgl" ).removeClass('').addClass('activetoggle');
          }

        }
      }
    })


    // Task count
    $.ajax({
      url: `sync/sync.php?as=gettaskct`,
      type:'POST',
      data: {
      },
      success:function(data) {
        if(`${taskct}` !== `${data}`){
          // What happens if the number of tasks loaded doesn't match the number of tasks fetched from the server.
          location.reload();
        }
      }
    })
  }, 60000);
}



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    SETTINGS PAGE
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
$('#daily-goal').keyup(function(){
  var goal = document.getElementById(`daily-goal`).value;

  // Sends the daily goal value to the server
  $.ajax({
    url: `sync/sync.php?as=dailygoalupdate`,
    type:'POST',
    data: {
      'goal': `${goal}`
    },
  })
});
//&goal=${goal}

// Delete account button
$(document).on('click', '.delete-account-button', function(event){
  $('.del-outer').css('display','initial');
  $('.delete-account-button').css('display','none');
});

// Cancel delete account button
$(document).on('click', '.delcancel', function(event){
  $('.del-outer').css('display','none');
  $('.delete-account-button').css('display','initial');
});

// Opens the dropdown container
$(document).on('click', '.open', function(){
  var id = $(this).data('id');

  $(`.dd-content`).css('display','none');
  $(`.close`).css('display','none');
  $(`.open`).css('display','initial');
  //$(`[id^=overlay-]`)  
  
  $(`#dropdown-${id} .open`).css('display','none');
  $(`#dropdown-${id} .close`).css('display','initial');
  $(`#dropdown-${id} .dd-content`).css('display','initial');
});

// Closes the dropdown container
$(document).on('click', '.close', function(){
  var id = $(this).data('id');

  $(`.dd-content`).css('display','none');
  $(`.close`).css('display','none');
  $(`.open`).css('display','initial');
  //$(`[id^=overlay-]`) 
});



















/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    NOTIFICATIONS
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/

// Makes sure that notifications are enabled
/*function notificationsEnable() {
  if (!window.Notification) {
    console.log('Browser does not support notifications.');
  } else {
    // check if permission is already granted
    if (Notification.permission === 'granted') {
      // show notification here
      var notify = new Notification('Tasks', {
        body: 'Notifications enabled.',
        icon: 'https://tasks.hstly.net/app/icons/favicon.png',
      });
    } else {
      // request permission from user
      Notification.requestPermission().then(function (p) {
      if (p === 'granted') {
        // show notification here
        var notify = new Notification('Tasks', {
          body: 'Notifications enabled.',
          icon: 'https://tasks.hstly.net/app/icons/favicon.png',
        });
      } else {
        console.log('User blocked notifications.');
      }
    }).catch(function (err) {
      console.error(err);
    });
    }
  }
}*/

// Sends notifications
function notificationSend() {
  // Checks to see if the user has notifications enabled.
  if(`${usrreminderen}`=='true'){
    $('.noti-item').map(function(){
      // Gets the info for the task.
      var id = $(this).data('id');
      var date = $(this).data('date');
      var name = $(this).data('task');
      var content = document.getElementById(`${id}`).innerHTML;

      if(`${date}` == `${todaydate}`){
        // Checks if the admin has disabled the email sending.
        if(`${reminderemailen}`=='true'){
          // Send the request to the email server.
          $.ajax({
            url: `sync/notification-send.php`,
            type:'POST',
            data: {
              'name': `${content}`
            },
          })
        }

        // Marks the task that the reminder has been sent and that it doesn't need to be send again.
        $.ajax({
          url: `sync/sync.php?as=remindersent`,
          type:'POST',
          data: {
            'id': `${id}`
          },
        })

        // Send a desktop notification if permissions are granted.
        /*if (Notification.permission === 'granted') {
          // show notification here
          var notify = new Notification('Tasks', {
              body: `${content}`,
              icon: 'https://tasks.hstly.net/app/icons/favicon.png',
          });
        }*/
      }
    }).get();
  }
}