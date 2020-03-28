<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
  </head>
  <body>
    <!--Login Page-->
    <div class="row">
      <!--Image-->
      <div class="column" id="image">
        <img src="background.png" class="img-img">
      </div>

      <!--Verify Form-->
      <div class="column" id="login">
        <h1>Verification</h1>
        <p>You already have an<br>account with us. It's just<br>that it isn't verified. If you<br>verify it you can go back and<br>start working.</p>
        <p>Please type the email<br>you would like to verify.</p>
        <br><br>
        <form action="verify.php" method="post">
          <input type="email" name="email" required autocomplete="false" class="verify-input" placeholder="Email:">
          <br><br>
          <input type="submit" class="submit" value="Verify">
        </form>
      </div>
    </div>
  </body>
</html>
<style>
html, body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.column {
  float: left;
  padding: 10px;
}

#image {
  width: 70%;

  text-align: center;
}

#login {
  width: 30%;

  padding-top: 100px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

input.verify-input {
  border: transparent;
  outline: none;
  border-bottom: 1px solid #a9a9a9;

  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 10px;
  padding-right: 10px;

  width: 60%;
}

input.submit {
  border: transparent;
  outline: none;
  
  background-color: #00ccbe;

  color: #fff;
  font-size: 16px;

  padding-top: 10px;
  padding-bottom: 10px;

  width: 60%;
}

input.submit:hover {
  opacity: 0.7;
  cursor: pointer;
  transition-duration: 0.3s;
}

@media screen and (max-width: 1087px) {
  #image {
    width: 0;
    opacity: 0;
    text-align: center;
  }

  #login {
    width: 90%;
    padding-top: 0px;
  } 

  html, body {
    padding-left: 100px;
  }
}

@media screen and (max-width: 909px) {
  #image {
    width: 0;
    opacity: 0;
    text-align: center;
  }

  #login {
    width: 90%;
    padding-top: 0px;
  } 

  html, body {
    padding-left: 10px;
  }
}
</style>