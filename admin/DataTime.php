<?php
date_default_timezone_set("Asia/Tashkent");
$CurrentTime = time();

$DataTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
echo $DataTime;
?>
