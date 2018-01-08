<?php
// get the q parameter from URL
$q = $_GET["q"];
$delimiter = '-';
$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $q);
$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
$clean = strtolower(trim($clean, '-'));
$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

echo $clean;
?>