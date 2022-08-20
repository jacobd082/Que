<?php

print $_GET['txt'];


$myfile = fopen("log.txt", "w") or die("Unable to open file!");
$fc = fread($myfile,filesize("log.txt"));
$txt = $fc . $_GET['txt'] . "\n";
fwrite($myfile, $txt);
fclose($myfile);

?>