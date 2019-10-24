<?php
  //This stops SQL Injection in POST vars
  foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($value);
  }

  //This stops SQL Injection in GET vars
  foreach ($_GET as $key => $value) {
    $_GET[$key] = mysqli_real_escape_string($value);
  }
  
   //This stops SQL Injection in REQUEST vars
  foreach ($_REQUEST as $key => $value) {
    $_REQUEST[$key] = mysqli_real_escape_string($value);
  }
?>