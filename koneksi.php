<?php

$host = "localhost";
$user = "root";
$pass = "mysql";
$db = "RPL";

$link = mysql_connect($host,$user,$pass);
if($link) {
  mysql_select_db($db);
} else {
  die(mysql_error($link));
}

?>
