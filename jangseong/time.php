<?php
$startTime = ("00:11:14");


echo 'Start time: '.$startTime;

echo "<br>";


$str = "00:11:14";

$hour = substr($str, 0,2);
$minute = substr($str, 3,2);
$second = substr($str, 6,2);

$cenvertedTime = date("H:i:s",strtotime("+.'$hour'. hour +.'$minute'. minutes +.'$second'. seconds",strtotime($startTime)));



echo "<br>";

echo 'Count: '.$cenvertedTime; 




?>