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

  $.ajax({
    url: `https://${initurl}/app/sync/extension.php?as=initialsync`,
    method:"POST",
    data:{
      'identifier': `${initaid}`
    },
    success:function(data) {
      var stripone = data.replace('[', '');
      var striptwo = stripone.replace(']', '');
      var jsondata = JSON.parse(striptwo);
      window.localStorage.setItem(`firstname`, jsondata.firstname);
      window.localStorage.setItem(`lastname`, jsondata.lastname);
      window.localStorage.setItem(`username`, jsondata.username);
    }
  })

  $('.setup').css('display','none');
  $('.main').css('display','initial');
});









// Gets the storage
var initurlget = window.localStorage.getItem('initurl');
var initaidget = window.localStorage.getItem('initaid');
var firstname = window.localStorage.getItem('firstname');
var lastname = window.localStorage.getItem('lastname');
var username = window.localStorage.getItem('username');

// Gets the current tab
chrome.tabs.getSelected(null, function(tab) {
  var url = tab.url;
  $('.currenturl').val(`${url}`);
  $('.deploymenturl').html(`${initurlget}`);
  $('.username').html(`${username}`);

  $('.link').html(`<a href="https://${initurlget}/app/index.php#links" target="_blank">Go to Links page</a>`);
});


// Sends data to the server and displays alerts
$(document).on('click', '.currenturlsend', function(event){
  var url = $('.currenturl').val();

  $.ajax({
    url: `https://${initurlget}/app/sync/extension.php?as=addtask`,
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

// Logout
$(document).on('click', '.logout', function(event){
  localStorage.clear();

  $('.setup').css('display','initial');
  $('.main').css('display','none');
});