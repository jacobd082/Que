<?php

print $_GET['txt'];
$myfile = fopen("log.txt", "w+") or die("Unable to open file!");

$txt = fread($myfile,filesize("log.txt"));
$numtxt = (int)$txt;
$newnum = $numtxt + 1;
echo $newnum;
fwrite($myfile, $newnum);
fclose($myfile);
/*
print $_GET['txt'];


$myfile = fopen("log.txt", "a") or die("Unable to open file!");
$txt = $_GET['txt'] . ",";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>