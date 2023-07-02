<?php
  session_start();
  require '../utils/congif.php';
  require '../models/User.php';

  $user = new User();
  $user->login();
?>