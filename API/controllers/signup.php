<?php
  require '../utils/congif.php';
  require '../models/User.php';


  $user = new User();
  $user->signup();
?>