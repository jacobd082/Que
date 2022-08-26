<?php

$file = 'log.txt';

// default the counter value to 1
$counter = 1;

// add the previous counter value if the file exists    
if (file_exists($file)) {
    $counter += file_get_contents($file);
}

// write the new counter value to the file
file_put_contents($file, $counter);
/*
print $_GET['txt'];


$myfile = fopen("log.txt", "a") or die("Unable to open file!");
$txt = $_GET['txt'] . ",";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>