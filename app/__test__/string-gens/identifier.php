<?php
  $str = rand();
  $token = hash("sha256", $str);
  echo $token;