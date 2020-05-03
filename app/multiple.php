<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <script src="https://kit.fontawesome.com/8f49cccb89.js" crossorigin="anonymous"></script>
</head>
<body>
  <div id="today" class="section2">
    <button class="smallernav" >
      <i style="opacity: 0.3" class="fas fa-angle-double-left"></i>
    </button>
    <button class="smallernav" onclick="forwardToday()">
      <i class="fas fa-angle-double-right"></i>
    </button>
    <p>today</p>
  </div>

  <div id="tomorrow" class="section3">
    <button class="smallernav" onclick="prevTomorrow()">
      <i class="fas fa-angle-double-left"></i>
    </button>
    <button class="smallernav" onclick="forwardTomorrow()">
      <i class="fas fa-angle-double-right"></i>
    </button>
    <p>tomorrow</p>
  </div>

  <div id="twodays" class="section3">
    <button class="smallernav" onclick="prevTwodays()">
      <i class="fas fa-angle-double-left"></i>
    </button>
    <button class="smallernav" onclick="forwardTwodays()">
      <i class="fas fa-angle-double-right"></i>
    </button>
    <p>two days out</p>
  </div>

  <div id="threedays" class="section3">
    <button class="smallernav" onclick="prevThreedays()">
      <i class="fas fa-angle-double-left"></i>
    </button>
    <button class="smallernav" >
      <i style="opacity: 0.3" class="fas fa-angle-double-right"></i>
    </button>
    <p>three days out</p>
  </div>
</body>
</html>
<style>
  button.smallernav {
    background: transparent;
    outline: none;
    border: none;
    font-size: 20px;
  }
</style>
<script>
  window.onload=display;

  function display(){
    document.getElementById("tomorrow").style.display = 'none';
    document.getElementById("twodays").style.display = 'none';
    document.getElementById("threedays").style.display = 'none';
  }

  function forwardToday(){
    document.getElementById("today").style.display = 'none';
    document.getElementById("tomorrow").style.display = '';
  }

  function prevTomorrow(){
    document.getElementById("tomorrow").style.display = 'none';
    document.getElementById("today").style.display = '';
  }

  function forwardTomorrow(){
    document.getElementById("twodays").style.display = '';
    document.getElementById("tomorrow").style.display = 'none';
  }

  function prevTwodays(){
    document.getElementById("twodays").style.display = 'none';
    document.getElementById("tomorrow").style.display = '';
  }

  function forwardTwodays(){
    document.getElementById("twodays").style.display = 'none';
    document.getElementById("threedays").style.display = '';
  }

  function prevThreedays(){
    document.getElementById("threedays").style.display = 'none';
    document.getElementById("twodays").style.display = '';
  }
</script>