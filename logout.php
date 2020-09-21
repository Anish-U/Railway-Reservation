<?php

  session_start();
  include ('function.inc.php');
  
  unset($_SESSION['SUCCESS']);
  redirect('login.php');
?>