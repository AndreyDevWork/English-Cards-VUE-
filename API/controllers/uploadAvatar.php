<?php
  session_start();
  require '../utils/congif.php';
  require '../models/Profile.php';
  

  $profile = new Profile;
  $profile->uploadAvatar();


?>