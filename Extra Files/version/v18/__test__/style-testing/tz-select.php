<?php
$tz = "America/Detroit";
date_default_timezone_set($tz);

$yesterday = date('M-d-Y', strtotime('+0 day'));
echo $yesterday;