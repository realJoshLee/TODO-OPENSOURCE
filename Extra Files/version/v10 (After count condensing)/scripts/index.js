/*
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    SCREEN LOADER
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
var devmode = 'false'; // set to true or false

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

  // Opens inbox
  // ALT+1
  if (e.altKey && e.which == 49) {
    inboxactive();
  }

  // Opens planning
  // ALT+2
  if (e.altKey && e.which == 50) {
    planningactive();
  }

  // Opens log
  // ALT+3
  if (e.altKey && e.which == 51) {
    window.location.href = 'log.php';
  }

  // Opens stats
  // ALT+4
  if (e.altKey && e.which == 52) {
    statsactive();
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
if(location.hash=='#planning'){
  planningactive();
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

// Makes the today view active
function statsactive() {
  // Header info
  location.hash = 'stats';
  document.title = "Tasks - Stats";

  // Changes the view
  $('.inbox-page, .insight-page, .settings-page, .log-page, [id^=fdiv-]').css('display','none');
  $( ".inbox-nav, .planning-nav, .setting-btn, .log-nav, .folder-btn" ).removeClass('active').addClass('');

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
  document.title = "Tasks - Planning";

  // Changes the view
  $('.inbox-page, .settings-page, .log-page, [id^=fdiv-], .stats-page').css('display','none');
  $( ".inbox-nav, .settings-btn, .log-nav, .folder-btn, .stats-nav" ).removeClass('active').addClass('');

  $('.insight-page').css('display','initial');
  $( ".planning-nav" ).removeClass('').addClass('active');

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
  document.title = "Tasks - Inbox";
  
  // Changes the view
  $('.inbox-page').css('display','initial');
  $( ".inbox-nav" ).removeClass('').addClass('active');

  $('.insight-page, .settings-page, .log-page, [id^=fdiv-], .stats-page').css('display','none');
  $( ".planning-nav, .settings-btn, .log-nav, .folder-btn, .stats-nav" ).removeClass('active').addClass('');

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
  document.title = "Tasks - Log";
  window.location.href = 'log.php';
}

// Opens the folder
$(document).on('click', '.folder-btn', function(){
  var fid = $(this).data('id');

  // Header info
  location.hash = `fid-${fid}`;
  document.title = `Tasks - Folder`;
  
  // Changes the view
  $('.inbox-page, .insight-page, .settings-page, .log-page, [id^=fdiv-], .stats-page').css('display','none');
  $( ".inbox-nav, .planning-nav, .settings-btn, .log-nav, .folder-btn, .stats-nav" ).removeClass('active').addClass('');

  $(`#fdiv-${fid}`).css('display','initial');
  $( `#f-${fid}` ).removeClass('').addClass('active');

  count();
  
  if ($(window).width() < 830) {
    setTimeout(() => { 
      closenav();
    }, 100);
  }
});

// For the location hash reguarding folders
if(window.location.hash.includes('fid-')){
  function getSecondPart(str) {
    return str.split('-')[1];
  }
  // use the function:
  var fid = getSecondPart(window.location.hash);

  // Header info
  location.hash = `fid-${fid}`;
  document.title = `Tasks - Folder`;
  
  // Changes the view
  $('.inbox-page, .insight-page, .settings-page, .log-page, [id^=fdiv-], .stats-page').css('display','none');
  $( ".inbox-nav, .planning-nav, .settings-btn, .log-nav, .folder-btn, .stats-nav" ).removeClass('active').addClass('');

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
  document.title = "Tasks - Settings";
  
  // Changes the view
  $('.inbox-page, .insight-page, .log-page, [id^=fdiv-], .stats-page').css('display','none');
  $( ".inbox-nav, .planning-nav, .log-nav, .folder-btn, .stats-nav" ).removeClass('active').addClass('');

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
        url: `sync/sync.php?as=updatedatedrag&tid=${tid}`,
        method:"POST",
        data:{
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
});

// Opens the add folder box 
function folderaddopen() {
  $(`.folder-add-form`).css('display','initial');
  $(`.folder-add-icon, .folder-add-btn`).css('display','none');
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
  var inboxct = $('.inbox-page .task').length;
  document.getElementById("planningtasksct").innerHTML = `${planningct}`;
  document.getElementById("inboxtasksct").innerHTML = `${inboxct}`;

  // Count subtasks
  $('.task-main').map(function(){
    var id = $(this).data('id');
    
    if($(`div.subtasks-${id} .task`).length > 0){
      document.getElementById(`count-${id}`).innerHTML = '<span class="count"><i class="fas fa-check-double"></i></span>';
    }else{
      document.getElementById(`count-${id}`).innerHTML = '';
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
    url: `sync/sync.php?as=updatetask&task=${taskvalue}&tid=${tid}`
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
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=updatenotes&tid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
  })
});

// Delets the task
$(document).on('click', '.task-del-btn', function(){
  // Gets the task id
  var tid = $(this).data('id');
  $(`.task-${tid}`).fadeOut(100);
  $(`.task-${tid}`).remove();

  // Sync the request with the database
  $.ajax({
    url: `sync/sync.php?as=deltask&tid=${tid}`
  })

  count();
});

// Marks the task as compelte
$(document).on('click', '.task-complete-btn', function(){
  // Gets the task id
  var tid = $(this).data('id');

  $(`.task-${tid}`).css({'background-color':'#bbd2f0', 'opacity':'0.5'});
  $(`.task-${tid} .dot`).css({'background':'#0962b9', 'color':'#fff', 'border':'2px solid #0962b9'});
  setTimeout(function() {
    $(`.task-${tid}`).fadeOut(100);
    $(`.task-${tid}`).remove();

    count();
  }, 1000);

  var counter = $("#counter");
  counter.html( parseInt(counter.html()) + 1 );

  // Sync the request with the database
  $.ajax({
    url: `sync/sync.php?as=completetask&tid=${tid}`
  })

  // For the alert
  $('.alert-taskcomplete').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskcomplete').fadeOut(100);
  }, 1500);
});

// Updates the date
$(document).on('submit', 'div.insight-page .task-date-form', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  
  var datevar = document.getElementById(`date-${tid}`).value;
  $(`.task-${tid}`).appendTo(`#${datevar}`);
  $("[id^=overlay-]").css('display','none');
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=updatedate&tid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
  })

  count();

  // For the alert
  $('.alert-taskmove').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskmove').fadeOut(100);
  }, 1500);
});

// Updates the date
$(document).on('submit', 'div.inbox-page .task-date-form', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();
  
  var datevar = document.getElementById(`date-${tid}`).value;
  $(`.task-${tid}`).appendTo(`#${datevar}`);
  $("[id^=overlay-]").css('display','none');
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=updatedate&tid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
  })

  count();

  // For the alert
  $('.alert-taskmove').fadeIn(100);
  setTimeout(() => { 
    $('.alert-taskmove').fadeOut(100);
  }, 1500);
});

// Updates the date
$(document).on('submit', 'div.folderlist .task-date-form', function(event){
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
    url: `sync/sync.php?as=updatedate&tid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
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
    url: `sync/sync.php?as=removefromfolder&tid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
  })

  count();
});

// Updates the content of the subtasks
$('.task-edit').keyup(function(){
  var tid = $(this).data('id');
  var content = document.getElementById(`pv-task-${tid}`).innerHTML;

  $.ajax({
    url: `sync/sync.php?as=subtaskupdate&id=${tid}`,
    method:"POST",
    data:{
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
    url: `sync/sync.php?as=deletefolder&fid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
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
  document.getElementById(`fname-${fid}`).innerHTML = `${content}`;
  
  // Send everything to the server
  $.ajax({
    url: `sync/sync.php?as=fnameupdate&fid=${fid}`,
    method:"POST",
    data:$(this).serialize(),
  })
});

// Updates the timezone
$(document).on('submit', '#timezone-form', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Sends everything to the add_task page for it to be added to the db
  $('#submit').attr('disabled', 'disabled');
  
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
  $('#submit').attr('disabled', 'disabled');
  
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
    url: `sync/sync.php?as=share&id=${tid}`,
    method:"POST",
    data:{
      'share': `${share}`
    },
  })
});

$(document).on('click', '.remove-date', function(event){
  var tid = $(this).data('id');
  document.getElementById(`td-${tid}`).innerHTML = '';
  $(`#date-${tid}`).val("")

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
// Adding subtasks
$(document).on('submit', '.subtasks-form', function(event){
  var tid = $(this).data('id');
  // Stops the form from refreshing the page
  event.preventDefault();

  // Gemerates a random taskid code
  var subtaskid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150);

  // Adds everything to the div
  var taskvar = document.getElementById(`sti-${tid}`).value;
  $(`.subtasks-${tid}`).append( `
    <div class="task task-${subtaskid}" id="task-${subtaskid}" data-id="${subtaskid}">
      <div class="task-row" data-id="${subtaskid}">
        <!--Complete task btn-->
        <div class="task-column task-left">
          <span class="dot task-complete-btn" data-id="${subtaskid}"></span>
        </div>

        <!--Task list column-->
        <div class="task-column task-right" data-id="${subtaskid}">
          <span class="task-edit" id="pv-task-${subtaskid}" data-id="${subtaskid}" contenteditable>${taskvar}</span>
        </div>
      </div>
    </div>
  ` );
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=addsubtask&id=${subtaskid}&ptid=${tid}`,
    method:"POST",
    data:$(this).serialize(),
  })

  count();

  // Clears the form
  $(`#sbf-${tid}`)[0].reset();
});

// Handles adding of the tasks
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
    url: `sync/sync.php?as=addtask&id=${taskid}&day=${date}`,
    method:"POST",
    data:$(this).serialize(),
  })

  // Clears the form
  $(`#form-${date}`)[0].reset();

  count();
});

// Works on adding the folder to everything
$(document).on('submit', '.folder-add-form', function(event){
  // Stops the form from refreshing the page
  event.preventDefault();

  // Gemerates a random taskid code
  var fid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150);

  // Adds everything to the div
  var foldervar = document.getElementById(`folder-input`).value;
  $( `.folder-btns` ).append( `
    <?php include('dynamic/folder-from-js.php'); ?>
  ` );

  $( `.folder-container-page` ).append( `
    <?php include('dynamic/folder-list-add.php'); ?>
  ` );
            
  // Sends everything to the add_task page for it to be added to the db
  $.ajax({
    url: `sync/sync.php?as=addfolder&id=${fid}`,
    method:"POST",
    data:$(this).serialize(),
  })

  // Extra functions
  $(`.folder-add-form`)[0].reset();
  $('[id^=fdiv-], .folder-edit-container').css('display','none');  
  folderaddclose();
  count();
});

// Handles tasks to a folder
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
    url: `sync/sync.php?as=addtasktofolder&tid=${taskid}&fid=${fid}`,
    method:"POST",
    data:$(this).serialize(),
  })

  // Clears the form
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
function themelight() {
  $( ".theme-ctrl" ).removeClass('').addClass('light');
  $( ".theme-ctrl" ).removeClass('dark black').addClass('');

  $( ".lighttgl" ).removeClass('').addClass('activetoggle');
  $( ".darktgl, .blacktgl" ).removeClass('activetoggle').addClass('');

  $.ajax({
    url: `sync/sync.php?as=theme`,
    type:'POST',
    data: {
      'theme': `light`
    },
  })
}

function themedark() {
  $( ".theme-ctrl" ).removeClass('light black').addClass('');
  $( ".theme-ctrl" ).removeClass('').addClass('dark');

  $( ".lighttgl, .blacktgl" ).removeClass('activetoggle').addClass('');
  $( ".darktgl" ).removeClass('').addClass('activetoggle');

  $.ajax({
    url: `sync/sync.php?as=theme`,
    type:'POST',
    data: {
      'theme': `dark`
    },
  })
}

function themeblack() {
  $( ".theme-ctrl" ).removeClass('light dark').addClass('');
  $( ".theme-ctrl" ).removeClass('').addClass('black');

  $( ".lighttgl, .darktgl" ).removeClass('activetoggle').addClass('');
  $( ".blacktgl" ).removeClass('').addClass('activetoggle');
  
  $.ajax({
    url: `sync/sync.php?as=theme`,
    type:'POST',
    data: {
      'theme': `black`
    },
  })
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