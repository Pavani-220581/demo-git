<?php 
$file=fopen("data.txt","w");
fwrite($file,"this is file handling of php\n");
fwrite($file ,"Welcome to cse\n");
fclose($file);
echo "this file is successfully written";
?>
