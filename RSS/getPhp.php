<?php
header ("Content-Type:text/xml");

$urlAdd = $_REQUEST["url"];
$matches=substr($urlAdd, -9);
$file = file_get_contents($matches);

echo $file;

?>
