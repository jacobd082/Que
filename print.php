<?php

print $_GET['txt'];


$myfile = fopen("log.txt", "a") or die("Unable to open file!");
$txt = $_GET['txt'] . "\n";
fwrite($myfile, $txt);
fclose($myfile);

?>