function fetchKeyStatus() {
  if(licensecheck=='true'){
    $.ajax({
      url: `${keyserver}`,
      method:"POST",
      data:{
        'email':`${licenseemail}`,
        'key':`${licensekey}`
      },
      success:function(data) {
        var stripone = data.replace('[', '');
        var striptwo = stripone.replace(']', '');
        var jsondata = JSON.parse(striptwo);

        // Variables from SQL
        var status = jsondata.status;
        var created = jsondata.created;
        var expire = jsondata.end;

        if(status=='expired'){
          console.log('%c Expired License Key.', 'color: red');
          //window.location.href = "extras/licensing/expired.html";
        }
        if(status=='nonexistent'){
          console.log('%c Non-Existant License Key.', 'color: red');
          //window.location.href = "extras/licensing/nonexistant.html";
        }
        if(status=='active'){
          console.log('%c Active License.', 'color: green');
        }
      }
    });
  }
}