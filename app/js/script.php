<script>
  // For the sidenav
  function nav() {
    // var e = document.getElementById("mySidenav");
    if (document.getElementById("mySidenav").style.width == '15%')
    {
      document.getElementById("mySidenav").style.width = '0%';
      document.getElementById("right").style.width = '100%';
      document.getElementById("right").style.float = 'right';
    }
    else 
    {
      document.getElementById("mySidenav").style.width = '15%';
      document.getElementById("right").style.width = '85%';
      document.getElementById("right").style.float = 'right';
    }
  }

  function smallnav() {
    // var e = document.getElementById("mySidenav");
    if (document.getElementById("mySidenav").style.width == '100%')
    {
      document.getElementById("mySidenav").style.width = '0%';
      document.getElementById("right").style.width = '100%';
      document.getElementById("right").style.float = 'right';
    }
    else 
    {
      document.getElementById("mySidenav").style.width = '100%';
      document.getElementById("right").style.width = '0%';
      document.getElementById("right").style.float = 'right';
    }
  }
</script>