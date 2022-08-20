<?php

print $_GET['txt'];


$myfile = fopen("log.txt", "w") or die("Unable to open file!");
$txt = $_GET['txt'] . "\n";
fwrite($myfile, $txt);
fclose($myfile);

?>