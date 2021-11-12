var licensecheck = 'true';

// Please leave the keyserver value blank. This may be updated in the future.
var keyserver = 'http://10.0.1.100/1%20App/tasks-v2.0/licensing/';
var licenseemail = '<?php echo $licenseemail; ?>';
var licensekey = '<?php echo $licensekey; ?>';
var serialnum = '<?php echo $serialnumber; ?>';


// Sends data over to the server to validate everything
function fetchKeyStatus() {
  if(licensecheck=='true'){
    $.ajax({
      url: `${keyserver}validate.php`,
      method:"POST",
      data:{
        'as':`occasional`,
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
    

    // This script checks the version against the master version.
    $.ajax({
      url: `${keyserver}ver-check.php`,
      method:"POST",
      data:{
        'ver':`${currentver}`
      },
      success:function(data) {
        var stripone = data.replace('[', '');
        var striptwo = stripone.replace(']', '');
        var jsondata = JSON.parse(striptwo);

        // Variables from SQL
        var status = jsondata.status;

        // If there is an update
        if(status=='update-available'){
          console.log('%c App has update available.', 'color: yellow');

          // Sends request to the server telling it that there is an update
          $.ajax({
            url: `sync/sync.php?as=updatestatus`,
            method:"POST",
            data:{
              'updatestatus':`update-available`,
            },
          })
        }

        // If there isn't an update
        if(status=='up-to-date'){
          console.log('%c App is up to date.', 'color: green');

          // Sends request to the server telling it that there isn't an update
          $.ajax({
            url: `sync/sync.php?as=updatestatus`,
            method:"POST",
            data:{
              'updatestatus':`up-to-date`,
            },
          })
        }
      }
    });
  }
}