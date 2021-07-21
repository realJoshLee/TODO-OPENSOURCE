// First load
window.onload = function() {
  checksets();
};
// Checks if the local storage values exist
function checksets() {
  if (localStorage.getItem("initurl") !== null) {
    // Cookie does exist
    $('.setup').css('display','none');
    $('.main').css('display','initial');
  }else{
    // Cookie does not exist
    $('.setup').css('display','initial');
    $('.main').css('display','none');
  }
}

// Handles init functions
$(document).on('submit', '.init-form', function(event){
  event.preventDefault();
  $('.form-control-submit').attr('disabled', 'disabled');

  var initurl = $('.form-init-url').val();
  var initaid = $('.form-init-aid').val();
  window.localStorage.setItem(`initurl`, `${initurl}`);
  window.localStorage.setItem(`initaid`, `${initaid}`);
  /*$.ajax({
    url: `sync/sync.php?as=updatetimezone`,
    method:"POST",
    data:$(this).serialize(),
  })*/
  $('.setup').css('display','none');
  $('.main').css('display','initial');
});









// Gets the storage
var initurlget = window.localStorage.getItem('initurl');
var initaidget = window.localStorage.getItem('initaid');

// Gets the current tab
chrome.tabs.getSelected(null, function(tab) {
  var url = tab.url;
  $('.currenturl').val(`${url}`);
  $('.deploymenturl').html(`${initurlget}`);
});


// Sends data to the server and displays alerts
$(document).on('click', '.currenturlsend', function(event){
  var url = $('.currenturl').val();

  $.ajax({
    url: `https://${initurlget}/app/sync/extension.php`,
    method:"POST",
    data:{
      'accountid': `${initaidget}`,
      'url': `${url}`
    },
  })

  // For the alert
  $('.banner-container').fadeIn(100);
  setTimeout(() => { 
    $('.banner-container').fadeOut(100);
  }, 1500);
});