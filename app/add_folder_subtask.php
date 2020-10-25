<?php

//add_task.php

include('init.php');

$task = base64_encode(openssl_encrypt(trim($_POST["task_name"]), $method, $key, OPENSSL_RAW_DATA, $iv));

if($_POST["task_name"])
{
  $data = array(
    ':account'  => $account,
    ':name' => $task,
    ':parenttaskid' => $_GET["parent"]
  );

  $query = "
  INSERT INTO tasksfoldertasks 
  (account, name, parenttaskid) 
  VALUES (:account, :name, :parenttaskid)
  ";

  $statement = $connect->prepare($query);

  if($statement->execute($data))
  {
    $id = $connect->lastInsertId();

    echo '<div class="getridof-'.$id.'">
    <span class="rownav" id="hovereffect">
    <span class="columnnav markbox">
      <p><a style="text-decoration: none;" href="#" class="marklink list-group-item" id="list-group-item-'.$id.'" data-id="'.$id.'"><span class="checkbox'.$id.'"><span class="noopacity">&#10004;</span></span></a></p>

      <style>
        span.checkbox'.$id.' {
          border: 2px solid #d1d3d5;
          border-radius: 5px;
          padding-left: 2px;
          padding-right: 2px;
          font-size: 10px;
        }

        span.checkbox'.$id.':hover {
          background-color: #d1d3d5;
        }
      </style>
    </span>
    <span class="columnnav textbox">
      <p class="dropbtn" data-id="'.$id.'">'.$_POST['task_name'].'</p>
      <div class="dropdown dropdown-'.$id.'" data-id="'.$id.'">
        <a class="close" style="font-size: 18px;" data-id="'.$id.'"><svg class="sizing" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-5x"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg></a>
        &nbsp;

        <!--Delete-->
        <a href="actions.php?as=trash&item='.$id.'" class="navlink"><svg class="trash sizing sizingsmall" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash fa-w-14 fa-2x"><path fill="currentColor" d="M440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h18.9l33.2 372.3a48 48 0 0 0 47.8 43.7h232.2a48 48 0 0 0 47.8-43.7L421.1 96H440a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zm184.8 427a15.91 15.91 0 0 1-15.9 14.6H107.9A15.91 15.91 0 0 1 92 465.4L59 96h330z" class=""></path></svg></a>

        &nbsp;

        <!--Highlight-->
        <a href="actions.php?as=highlight&item='.$id.'" class="navlink"><svg class="sizing sizingsmall" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="highlighter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" class="svg-inline--fa fa-highlighter fa-w-17 fa-2x"><path fill="currentColor" d="M528.61 75.91l-60.49-60.52C457.91 5.16 444.45 0 430.98 0a52.38 52.38 0 0 0-34.75 13.15L110.59 261.8c-10.29 9.08-14.33 23.35-10.33 36.49l12.49 41.02-36.54 36.56c-6.74 6.75-6.74 17.68 0 24.43l.25.26L0 479.98 99.88 512l43.99-44.01.02.02c6.75 6.75 17.69 6.75 24.44 0l36.46-36.47 40.91 12.53c18.01 5.51 31.41-4.54 36.51-10.32l248.65-285.9c18.35-20.82 17.37-52.32-2.25-71.94zM91.05 475.55l-32.21-10.33 40.26-42.03 22.14 22.15-30.19 30.21zm167.16-62.99c-.63.72-1.4.94-2.32.94-.26 0-.54-.02-.83-.05l-40.91-12.53-18.39-5.63-39.65 39.67-46.85-46.88 39.71-39.72-5.6-18.38-12.49-41.02c-.34-1.13.01-2.36.73-3l44.97-39.15 120.74 120.8-39.11 44.95zm248.51-285.73L318.36 343.4l-117.6-117.66L417.4 37.15c4.5-3.97 17.55-9.68 28.1.88l60.48 60.52c7.65 7.65 8.04 20 .74 28.28z" class=""></path></svg></a>

        &nbsp;

        <!--Pin-->
        <a href="actions.php?as=pin&item='.$id.'" class="navlink"><svg class="sizing sizingsmall" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="thumbtack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-thumbtack fa-w-12 fa-3x"><path fill="currentColor" d="M300.8 203.9L290.7 128H328c13.2 0 24-10.8 24-24V24c0-13.2-10.8-24-24-24H56C42.8 0 32 10.8 32 24v80c0 13.2 10.8 24 24 24h37.3l-10.1 75.9C34.9 231.5 0 278.4 0 335.2c0 8.8 7.2 16 16 16h160V472c0 .7.1 1.3.2 1.9l8 32c2 8 13.5 8.1 15.5 0l8-32c.2-.6.2-1.3.2-1.9V351.2h160c8.8 0 16-7.2 16-16 .1-56.8-34.8-103.7-83.1-131.3zM33.3 319.2c6.8-42.9 39.6-76.4 79.5-94.5L128 96H64V32h256v64h-64l15.3 128.8c40 18.2 72.7 51.8 79.5 94.5H33.3z" class=""></path></svg></a>
        
        &nbsp;&nbsp;

        <!--Grey-->
        <a href="actions.php?as=default&item='.$id.'" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid grey; border-radius: 6px; font-size: 10px; background-color: transparent;" class="checkboxcolor"></span></a>

        &nbsp;

        <!--Red-->
        <a href="actions.php?as=red&item='.$id.'" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #ff006a; border-radius: 6px; font-size: 10px; background-color: #fccce1;" class="checkboxcolor"></span></a>

        &nbsp;

        <!--Green-->
        <a href="actions.php?as=green&item='.$id.'" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #00ff26; border-radius: 6px; font-size: 10px; background-color: #dbffe1;" class="checkboxcolor"></span></a>

        &nbsp;

        <!--Blue-->
        <a href="actions.php?as=blue&item='.$id.'" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #006fff; border-radius: 6px; font-size: 10px; background-color: #cfe4ff;" class="checkboxcolor"></span></a>

        &nbsp;

        <!--Orange-->
        <a href="actions.php?as=orange&item='.$id.'" class="navlink"><span style="height: 16px; width: 16px; display: inline-block; border: 2px solid #ff5900; border-radius: 6px; font-size: 10px; background-color: #ffe3d4;" class="checkboxcolor"></span></a>

        
      </div>
    </span>
  </span>
  </div>';
  }
}


?>