<style>
  /*Global
  ############################################################*/
  html, body {
    padding: 0;
    margin: 0;

    /*font-family: 'Montserrat', Arial, Helvetica, sans-serif;*/
    font-family: 'Karla', Arial, Helvetica, sans-serif;
    font-size: 15px;
    word-break: break-word;
  
    background-color: #fff;
    <?php if($theme=='dark'){echo 'background-color: #0b0b11;';}else{echo 'background-color: #fff;';}; ?>
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
  }

  * { /* For the column charts */
    margin: 0;
    box-sizing: border-box;
  }

  /* For the scroll bar */
  ::-webkit-scrollbar {
    width: 7px;
  }

  ::-webkit-scrollbar-track {
    border-radius: 10px;
    background-color: #f5f5f5;
  }
  
  ::-webkit-scrollbar-thumb {
    background: grey; 
    border-radius: 10px;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: #ededed; 
  }

  /* Color presets */
  .blue {
    color: #006fff;
    text-decoration: none;
  }

  .red {
    color: red;
    text-decoration: none;
  }

  .black {
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
  }

  .green {
    color: green;
  }

  /*Fonts*/
  @font-face {
    font-family: golroy;
    src: url(fonts/Gilroy-Light.otf);
  }
  
  @font-face {
    font-family: sofia_ultralight;
    src: url(fonts/Sofia Pro UltraLight Az.otf);
  }
  
  @font-face {
    font-family: sofia_light;
    src: url(fonts/Sofia Pro Light Az.otf);
  }









  /*Productivity Habbits Page
  ############################################################*/
  .activityLink { /* The buttons that select the year to show info for */
    color: #006fff;
    text-decoration: none;

    padding-top: 3px;
    padding-bottom: 3px;
    padding-left: 5px;
    padding-right: 5px;

    border-radius: 10px;
    border: 1px solid #006fff;
  }

  .activityLink:hover { /* The buttons that select the year to show info for */
    background: #006fff;
    color: #fff;
    transition-duration: 0.3s;
  }

  div.activitypage .active { /* The buttons that select the year to show info for */
    color: #f56c62 !important;
    border: 1px solid #f56c62 !important;
  }

  div.activitypage .active:hover { /* The buttons that select the year to show info for */
    color: #fff !important;
    background: #f56c62 !important;
    transition-duration: 0.3s;
  }









  /* Loader Box (The box that shows up to let everything else load)
  ############################################################*/
  /* Everything for the animation of the bars */
  .loader-circle {
    border: 7px solid #f3f3f3;
    border-radius: 50%;
    border-top: 7px solid #006fff;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite; /* Safari */
    animation: spin 2s linear infinite;
  }

  /* Safari */
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }


  .loader { /* Loader box itself */
    color: #111;

    text-align: center;
    align-items: center;

    height: 100vh;
    width: 100%;

    padding-top: 200px;
  }

  .center-align-loader {
    text-align: center;
    float: center;
    align-items: center;
  }

  div.center { /* Centers the loading animation bars */
    text-align: center;
    float: center;
    align-items: center;
  }

  .loader .loader_img { /* Tasks logo style */
    width: 200px;
    height: auto;
  }

  .spinner {
    width: 100px;
    height: auto;
  }









  /* Modal Box
  ############################################################*/
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  .modal-content { /* Modal Content in the container */
    <?php if($theme=='dark'){echo 'background-color: #0b0b11;';}else{echo 'background-color: #fff;';}; ?>
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
    margin: auto;
    padding: 20px;
    width: 400px;
  }

  .closemodal { /* The Close Button */
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .closemodal:hover,
  .closemodal:focus { /* The Close Button */
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
    text-decoration: none;
    cursor: pointer;
  }

  button {
    background: transparent;
    outline: none;
    border: transparent;
  }










  /*Nav
  ############################################################*/
  .page-column {
    float: left;
  }

  .page-row:after {
    content: "";
    display: table;
    clear: both;
  }

  .page-nav {
    <?php if($theme=='dark'){echo 'background-color: #15151b;';}else{echo 'background-color: #f6f4f9;';}; ?>
    height: 100vh;
    position: fixed;
    width: 15%;
  }

  .page-content {
    width: 100%;
    padding-left: 30%;
    padding-right: 300px;
  }

  .navcolumn { /* The top nav bar */
    float: left;
    width: 50%;
    padding: 10px;
  }
  
  div.navitem {
    padding-bottom: 5px;
  }

  div.navtwo {
    display: none;
  }

  .folder-add-plus {
    height: 16px;
    width: auto;
    cursor: pointer;
  }

  .folder-title-right { /*Plus button next to the folder title*/
    text-align: right;
    float: right;
  }

  .small-screen-show {
    display: none;
  }

  .no-decor { /*Removes all of the decor from the links*/
    text-decoration: none;
  }

  .nav-display-none { /* Top padding for mobile */
    display: none;
  }

  .navrow { /* Background colors and colors for the light and dark theme for the nav bar */
    <?php if($theme=='dark'){echo 'background-color: #2d2c32;';}else{echo 'background-color: #f9f9f9;';}; ?>
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
    <?php if($theme=='light'){echo'border-bottom: 1px solid #f1f1f1;';}?>
    position: fixed;
    width: 100%;
  }

  #todaycompletect { /* Daily goal and how many tasks you completed today */
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: none;
    border: none;
    outline: none;

    width: 20px;
    text-align: right;
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
  }

  .navrow:after {
    content: "";
    display: table;
    clear: both;
  }

  .navright {
    text-align: right;
  }

  div.navitem { /* Item in the slide out nav */
    padding-left: 10px;
    padding-right: 10px;
    font-family: 'sofia-pro-soft', arial !important;
    font-weight: 700;
    font-style: normal;
  }

  div.navitem button {
    padding-top: 5px;
    padding-bottom: 5px;
  }

  div.navitem button.active { /* Item in the slide out nav */
    <?php if($theme=='dark'){echo 'background: #2f3039 !important;';}else{echo 'background: #e4e3ed !important;';}; ?>
    width: 100%;
    text-align: left;
    /*font-weight: bold;*/
    border-radius: 3px;
  }

  img.navbutton { /* Img next to the the button */
    height: 30px;
    width: auto;
  }
  
  a.navlink { /* Container for the links */
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
  }

  img.logo { /* Nav button */
    width: 25px !important;
    height: auto;
  }

  div.nav { /* Side nav container */
  }

  div.sidenav { /* Side nav container */
    height: 100%;
    width: 100%;

    padding-top: 60px;

    /*-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);*/
  }
  
  div.sidenav a { /* Side nav container links */
    padding: 8px 8px 8px 15px;

    text-decoration: none;

    transition: 0.3s;

    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #333;';}; ?>
  }
  
  div.sidenav a:hover { /* Side nav container links */
    color: grey;
  }
  
  div.sidenav .closebtn { /* Side nav close button */
    position: absolute;

    top: 0;
    right: 25px;
    margin-left: 50px;

    font-size: 36px;
  }
  
  .navsizing { /* Sizing for the svg icons in the side nav */
    width: auto;
    height: 18px;
  }

  div.nav span.navtext { /* Text next to the styling */
    /*font-weight: bold;*/
    font-size: 18px;
    font-family: 'sofia-pro-soft', arial !important;
    font-weight: 400;
    font-style: normal;
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #404245;';}; ?>
  }

  div.nav button.folderbutton {
    font-family: 'sofia-pro-soft', arial !important;
    font-weight: 400;
    font-style: normal;
    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #404245;';}; ?>
  }

  .halfopacitynav {
    opacity: 0.3 !important; 
  }

  div.nav_bottom { /* Settings button at the bottom of the nav */
    position: absolute;
    bottom: 10px;
  }

  div.containernav { /* Inner container width */
    width: 400px;
  }

  .folder-button-text {
    font-size: 16px !important;
  }

  .projects-heading {
    font-size: 15px !important;
    padding-left: 5px;
  }

  .folderadd {
    padding-left: 4px;
    font-family: 'sofia-pro-soft', arial !important;
    font-weight: 400;
    font-style: normal;
  }












  /*Page Formatting
  ############################################################*/
  div.main { /* Padding on either side of the content */
    /*padding-top: 30px;
    padding-left: 400px;
    padding-right: 400px;*/
  }









  /*Settings Page
  ############################################################*/
  .form-control-settings { /* Form styles in the settings page */
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;

    border: 1px solid grey;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;

    border-radius: 5px;
  }

  .form-control-submit {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    border: none;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;

    border-radius: 5px;

    background-color: #111;
    border: 1px solid #111;
    color: #fff;
  }
  
  .form-control-submit:hover {
    color: #111;
    background: transparent;
    cursor: pointer;
  }

  button.form-control-settings-expand {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    border: none;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;

    border-radius: 5px;

    background-color: #111;
    border: 1px solid #111;
    color: #fff;
  }

  button.form-control-settings-expand:hover {
    color: #111;
    background: transparent;
    cursor: pointer;
  }

  .settings-dropdown-inner {
    padding-left: 10px;
  }

  .settings-right {
    text-align: right;
  }
  
  .settings-column {
    float: left;
    width: 50%;
  }

  .settings-row:after {
    content: "";
    display: table;
    clear: both;
  }









  /*Folder and Note Page
  ############################################################*/
  .folder-column {
    float: left;
    width: 50%;
  }

  .form-control-notes {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    border: none;
    
    width: 100%;
  }

  .folder-row:after {
    content: "";
    display: table;
    clear: both;
  }

  .folder-right {
    text-align: right;
  }

  .folder-row {
    padding: 4px;
    border-radius: 3px;
    border-bottom: 1px solid #ededed;
  }

  .folder-row:hover {
    background-color: #e8f0fe;
  }

  .folder-icon-folder-page {
    height: 16px;
    width: auto;
  }









  /*Tasks
  ############################################################*/
  .topspacer {
    padding: 10px;
  }

  .insight-header {
    padding: 3px;
  }

  div.main h2 { /* Style for the element that contains the date */
    font-family: 'sofia-pro-soft', Arial;
    font-weight: 500;
  }

  /*(div.task-outer:hover {
    <?php // if($theme=='dark'){echo 'background-color: #35455c;';}else{echo 'background-color: #dbebff;';}; ?>
    cursor: pointer;
  }*/

  .task-complete { /* Move the complete button to the top of the div for exrta tall tasks */
    vertical-align: top;
  }

  .task-input { /* Contains for the task text */
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    outline: none;
    border: none;
    background: transparent;

    padding-left: 3px;
    padding-right: 3px;

    font-family: 'karla', Arial, Helvetica, sans-serif;
    font-size: 15px;
    width: 100%;

    overflow: hidden;
  }

  [contenteditable] {
    outline: 0px solid transparent;
  }

  .alert-fa-none {
    display: none;
  }
  
  .alert { /* Alert container for the change priority text */
    display: none;
    
    border: 1px solid #ff002b;
    border-radius: 10px;
    background: #ff9cac;

    padding: 10px;
  }
  
  .alert-style { /* Alert container for the change priority text */
    border: 1px solid #ff002b;
    border-radius: 10px;
    background: #ff9cac;

    padding: 10px;
    width: 100%;
  }

  a.deltask-box {
    cursor: pointer;
  }

  div.task-outer { /* Spacing around the task */
    margin-left: 10px;
    margin-bottom: 7px;
  }

  span.smalltxt-history {
    font-size: 14px;
  }

  span.history-date {
    color: #006fff;
  }

  span.history-folder {
    color: #ff4400;
  }

  .button {
    background-color: #006fff;

    color: #fff;
    text-decoration: none;

    padding-top: 3px;
    padding-bottom: 3px;
    padding-right: 10px;
    padding-left: 10px;
    border-radius: 10px;
  }

  .trash-folder-icon {
    height: 16px;
    width: auto;
  }
  
  .hovershow { /* Shows the buttons on the side of the container when hovered */
    display: none;
  }

  .form-control-folder-name {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    color: #006fff;
    font-size: 20px;
    font-weight: bold;
    
    width: 80%;

    outline: none;
    border: transparent;
    background: none;

    padding: 0;
  }

  .hovershow:hover {
    display: initial;
  }

  .task:hover + .hovershow {
    display: initial;
  }

  .editicon {
    height: 14px;
    width: auto;
  }

  .date {
    font-size: 14px;
  }

  input.form-control {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    /*Extra Styles*/
    border: transparent;
    border-radius: 3px;
    outline: none;
    background: none;

    padding: 3px;
    width: 100%;

    <?php if($theme=='dark'){echo 'color: #fff;';}else{echo 'color: #111;';}; ?>
  }









  /* Task Priority Styles
  ############################################################*/
  .p1 {
    border: 2px solid #FD7B64 !important;
    <?php //if($theme=='dark'){echo 'background: #6A4B4B !important;';}else{echo 'background: #FFE4E4 !important;';}; ?>
    border-radius: 6px;

    height: 15px;
    width: 15px;

    display: inline-block;
  }

  .p1:hover {
    <?php if($theme=='dark'){echo 'background: #6A4B4B !important;';}else{echo 'background: #FFE4E4 !important;';}; ?>
  }

  .p2 {
    border: 2px solid #2790D6 !important;
    border-radius: 6px;
    <?php //if($theme=='dark'){echo 'background: #214c85 !important;';}else{echo 'background: #d1e5ff !important;';}; ?>

    height: 15px;
    width: 15px;

    display: inline-block;
  }

  .p2:hover {
    <?php if($theme=='dark'){echo 'background: #214c85 !important;';}else{echo 'background: #d1e5ff !important;';}; ?>
  }

  .p3 {
    border: 2px solid grey !important;
    <?php //if($theme=='dark'){echo 'background: #4d4d54 !important;';}else{echo 'background: #ededed !important;';}; ?>
    border-radius: 6px;
    
    height: 15px;
    width: 15px;
    
    display: inline-block;
  }

  .p3:hover {
    <?php if($theme=='dark'){echo 'background: #4d4d54 !important;';}else{echo 'background: #ededed !important;';}; ?>
  }

  .sub-completed {
    border: 2px solid #ededed !important;
    <?php //if($theme=='dark'){echo 'background: #4d4d54 !important;';}else{echo 'background: #ededed !important;';}; ?>
    border-radius: 6px;
    
    height: 15px;
    width: 15px;
    
    display: inline-block;
  }

  .sub-completed-text {
    text-decoration: line-through !important;
  }









  
  /*Edit section under the task
  ############################################################*/
  .date-edit {
    color: #111 !important;
    background: #f7f8fa !important;
    border: transparent !important;
  }

  img.edit-exit {
    height: 20px;
    width: auto;
    cursor: pointer;
  }

  .editicon {
    cursor: pointer;
  }

  .inner-edit {
    <?php if($theme=='dark'){echo 'background-color: #15151b;';}else{echo 'background-color: #FCFCFC !important;';}; ?>
    padding: 5px;
    border-radius: 7px;
    /*-webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    
    #f6f4f9*/
    border: 1px solid #ededed;
  }
                
  .priorityflags {
    height: 18px;
    width: auto;
    cursor: pointer;
  }

  textarea#notes {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
                  
    width: 100%;
    background: #faf6ea;
    border: 1px solid #faf6ea !important;

    /*font-family: 'Montserrat', Arial, Helvetica, sans-serif;*/
    font-family: 'Karla', Arial, Helvetica, sans-serif;
    font-size: 15px;
                
    color: #aea366;
  }

  .svg-edit-size {
    height: 16px;
    width: auto;

    color: red;
  }

  input.form-control-edit {
    <?php if($theme=='dark'){echo 'border: 1px solid #222228 !important;';}else{echo 'border: 1px solid #ededed !important;';}; ?>
  }
  
  .form-control-update-notes {
    /*Remove all of the background shadows*/
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    border: none;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;

    border-radius: 5px;

    background-color: transparent;
    border: 1px solid #3F9BFF;
    color: #3F9BFF;
  }
  
  .form-control-update-notes:hover {
    color: #001F7A;
    border: 1px solid #001F7A;
    background: transparent;
    cursor: pointer;
  }

  p.dropdown-header {
    font-family: sofia-pro-soft, sans-serif;
    font-weight: 400;
    font-style: normal;
    margin-bottom: 2px;
  }









  /*Responsive
  ############################################################*/
  @media screen and (max-width: 1375px) {
    .page-nav {
      width: 20%;
    }

    .page-content {
      width: 100%;
      padding-left: 30%;
      padding-right: 250px;
    }
  }
  
  @media screen and (max-width: 1199px) {
    .page-nav {
      width: 25%;
    }

    .page-content {
      width: 100%;
      padding-left: 30%;
      padding-right: 200px;
    }
  }
  
  @media screen and (max-width: 1000px) {
    .page-content {
      padding-right: 150px;
    }
  }
  
  @media screen and (max-width: 877px) {
    .page-nav {
      width: 30%;
    }

    .page-content {
      width: 100%;
      padding-left: 35%;
      padding-right: 100px;
    }
  }
  
  @media screen and (max-width: 750px) {
    .arrow-disable-small {
      display: none;
    }

    .page-nav {
      width: 0%;
      display:none;
    }

    .page-content {
      width: 100%;
      padding-left: 10px;
      padding-right: 10px;
    }

    .small-screen-show {
      display: initial;
    }

    .nav-small-spacer {
      padding-top: 35px;
      padding-left: 10px;
    }

    div.task-outer {
      margin-bottom: 5px;
      font-size: 17px;
    }

    .p1, .p2, .p3 {
      height: 18px;
      width: 18px;
    }

    .task-input {
      font-size: 18px;
    }

    input.form-control {
      font-size: 17px !important;
    }

    .editicon {
      height: 20px;
      width: auto;
    }

    .priorityflags {
      height: 20px;
      width: auto;
    }

    img.navbutton {
      height: 30px;
    }

    img.logo {
      width: 20px;
    }

    div.sidenav .closebtn {
      font-size: 36px;
    }
    
    .navsizing {
      height: 22px;
      fill: #36353b;
      color: #36353b;
    }

    div.nav span.navtext {
      font-size: 18px;
    }
  }
  
  @media screen and (max-width: 550px) {
    .navpadding {
      padding-top: 20px;
      opacity: 0;
    }

    div.task-outer { /* Spacing around the task */
      margin-left: 10px;
      margin-bottom: 10px;
    }

    .closepadding {
      margin-top: 5px;
      position: relative;
    }

    .navbutton {
      position: absolute !important;
    }
  }
</style>
<script>
function openNav() {
  $('.page-nav').css('width','100%');
  $('.page-nav').css('display','initial');
  $('.page-content').css('display','none');
  //document.getElementById("main").style.opacity = "0.3";
  //$('.main').css('opacity','0.3');
  //$('.nav-dim').css('opacity','0.3');
  //document.cookie = "nav=open";

  //$('.page-nav').toggleClass('nav-animation'); 
}

function closeNav() {
  $('.page-nav').css('width','0');
  $('.page-nav').css('display','none');
  $('.page-content').css('display','initial');
  //document.getElementById("main").style.opacity = "1";
  //$('.main').css('opacity','1');
  //$('.nav-dim').css('opacity','1');
  //$('.folder-add-container-inner').css('display','none');
  //document.cookie = "nav=close";
}

/*window.onclick = function(event) {
  if (!event.target.matches('.nav')) {
    function closeNav();
  }
}*/
</script>
<?php
//if($_COOKIE['nav']=='open'){
//  echo '<script>openNav()</script>';
//}
?>