// Gets info from cloudflare
$.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
  console.log(data);
  //$("#track").html(data);
})

// Logs button clicks
$(document).on('click', 'button,a', function(){
  var bcontent = $("button").html();

  $.ajax({
    url: `test.php?bcontent=${bcontent}`,
    method:"POST",
    data:$(this).serialize(),
  })
});