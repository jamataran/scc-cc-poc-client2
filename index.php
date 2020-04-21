<?php

echo 'HOLA! Esta es una aplicación complicada: <br />';

$txtProperties = readfile('application.properties');
$result = array();
$lines = split("\n", $txtProperties);
$key = "";
$isWaitingOtherLine = false;
$value = "";

foreach ($lines as $i => $line) {
    if (empty($line) || (!$isWaitingOtherLine && strpos($line, "#") === 0)) continue;

    if (!$isWaitingOtherLine) {
        $key = substr($line, 0, strpos($line, '='));
        echo $key;
        echo '<br />';
        $value = substr($line, strpos($line, '=') + 1, strlen($line));
        echo '<br />';
        echo $value;
    } else {
        $value .= $line;
    }

    /* Check if ends with single '\' */
    if (strrpos($value, "\\") === strlen($value) - strlen("\\")) {
        $value = substr($value, 0, strlen($value) - 1) . "\n";
        $isWaitingOtherLine = true;
    } else {
        $isWaitingOtherLine = false;
    }

    $result[$key] = $value;
    unset($lines[$i]);
}

