<style>
  /*
  Global - Styles that apply to more than one item on a page.
  */
  html, body {
    background-color: #18181d;
    color: #fff;

    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }

  i.black {
    color: #fff;
  }

  i.red {
    color: red;
  }

  i.red:hover {
    color: lightcoral;
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

  div.container {
    padding-left: 50px;
    padding-right: 50px;
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









  /*
  Functions - Special things for the website.
  */
  .day {
    color: #5297ff;
    text-transform: capitalize;
  }









  /*
  Tasks - For the tasks that are displayed.
  */
  ul {
    padding-left: 0;
    list-style: none;
  }

  li {
    padding: 4px;
    border-bottom: 1px solid #242424;
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

    width: 80%;

    font-size: 16px;
    color: #fff;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  }

  .task {
    background: transparent;
    border: transparent;
    outline: none;

    color: #fff;
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;

    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
    
    width: 300px;
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
    background-color: #111;
    width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(255,255,255,0.2);
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

    background-color: #101015;
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
    color: #fff;
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

  .folderadd {
    border: 1px solid #757575 !important;
  }
</style>