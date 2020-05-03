<style>
  /*
  Global - Styles that apply to more than one item on a page.
  */
  html, body {
    background-color: #f6f7f8;
    color: #111;

    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }

  * {
    box-sizing: border-box;
  }

  /* Create four equal columns that floats next to each other */
  .column {
    float: left;
    width: 20%;
    padding: 1px;
  }

  .yesterday {
    opacity: 0.3;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  i.black {
    color: #111;
  }

  i.red {
    color: red;
  }

  i.red:hover {
    color: darkred;
    transition-duration: 0.2s;
  }

  i.yello {
    color: orange;
  }

  .inline {
    display: inline;
  }

  .display-none {
    display: none;
  }

  textarea {
    resize: none;
  }

  i.p1 {
    color: #ff0a43;
  }

  i.p2 {
    color: #ff9a24;
  }

  i.p3 {
    color: #5297ff;
  }

  button.submitd {
    background-color: transparent;
    border: none;
    outline: none;
    cursor: pointer;

    color: #111;
  }

  span.date {
    font-size: 12px;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
    text-decoration: none;
    font-weight:normal;
  }









  /*
  Functions - Special things for the website.
  */
  .day {
    color: #5297ff;
    text-transform: capitalize;
    font-size: 13px;
  }









  /*
  Tasks - For the tasks that are displayed.
  */
  ul {
    padding-left: 0;
    list-style: none;
  }

  li {
    padding-top: 4px;
    /*border-bottom: 1px solid #ededed;*/
  }

  /*.dot {
    height: 10px;
    width: 10px;

    border-radius: 50%;

    display: inline-block;

    border: 2px solid #5297ff;
    background-color: #e9f0fc;
  }*/

  .task-box {
    border: transparent;
    background: transparent;
    outline: none;

    width: 100%;

    font-size: 16px;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  }

  .taskarea {
    border: transparent;
    background: transparent;
    outline: none;

    width: 100%;

    font-size: 16px;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  }

  .task {
    background: transparent;
    border: transparent;
    outline: none;

    color: #111;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
    
    width: 100%;
  }

  .task:focus {
    border: 1px solid #a5a5a5;
    border-radius: 5px;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;

    transition-duration: 0.3s;
  }

  .submit {
    background-color: #5297ff;
    border: transparent;
    border-radius: 5px;

    color: #fff;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 8px;
    z-index: 1;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  a.dropdown-link {
    color: #5297ff;
    text-decoration: none;

    padding-top: 3px;
  }

  a.dropdown-link:hover {
    color: blue;
  }









  /*
  Sidenav
  */
  .sidenav {
    height: 100%;
    width: 0;

    position: fixed;

    z-index: 1;
    top: 0;
    left: 0;
    padding-top: 10px;

    background-color: #f2f3f5;
    overflow-x: hidden;

    transition: 0.1s;
  }

  .sidenav a {
    padding-top: 3px;
    padding-bottom: 3px;
    padding-left: 6px;
    padding-right:3px;

    text-decoration: none;
    font-size: 20px;
    color: #111;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    display: block;

    transition: 0.2s;
  }

  .sidenav a:hover {
    color: grey;
  }

  /*.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }*/

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
</style>