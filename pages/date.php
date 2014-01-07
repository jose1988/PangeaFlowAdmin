<?php

$Fecha = "09/17/2011"; 

echo date("m/d/Y", strtotime("$Fecha +1 month"));
echo "<br>";

echo date("m/d/Y", strtotime(date("m/d/Y")." +1 month"));
echo "<br>";

echo strtotime("now"), "\n";
echo "<br>";

echo strtotime("10 September 2000"), "\n";
echo "<br>";

echo strtotime("+1 day"), "\n";
echo "<br>";

echo strtotime("+1 week"), "\n";
echo "<br>";

echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo "<br>";

echo strtotime("next Thursday"), "\n";
echo "<br>";

echo strtotime("last Monday"), "\n";
echo "<br>";

?>