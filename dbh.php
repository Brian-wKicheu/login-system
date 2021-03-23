<?php
$dbconn = new mysqli("localhost", "root", "", "ps4");
if($dbconn->connect_error){
  die("connection lost".$dbconn->connect_error);
}
?>
