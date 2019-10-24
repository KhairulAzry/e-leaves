<?php
// session_start();

// $con = mysqli_connect("localhost","mohghr_eleaves","eleaves_system");

$con = mysqli_connect("localhost","root","", "app1");


if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

//mysqli_select_db("mohghr_eleeaves", $con);

mysqli_select_db( $con, "app1");

?>