// Longer version
function makeid(length) {
  var result           = '';
  var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for ( var i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}  
var stringold = makeid(24);

// Simplified
var string = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 150) + Math.random().toString(36).substring(2, 150)