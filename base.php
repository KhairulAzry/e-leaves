<?php
// session_start();

//$con = mysql_connect("localhost","mohghr_eleaves","eleaves_system");

$con = mysql_connect("localhost","root","PXS96W.Z85UxXlP!}8secKf]%");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

//mysql_select_db("mohghr_eleeaves", $con);

mysql_select_db("app1", $con);

?>