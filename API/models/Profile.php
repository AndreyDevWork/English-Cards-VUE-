<?php
  require '../database/DataBase.php';
  require 'FormValidate.php';
  class Profile {
    public function uploadAvatar() {
      if(FormValidate::validateImg('avatar')) {
        $fileName = uniqid() . $_FILES['avatar']['name'];
        $avatarPath = '../upload/avatars/' . $fileName;
        move_uploaded_file($_FILES['avatar']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/upload/avatars/' . $fileName);
        
        $mysql = DataBase::connectDB();
        $prepare = $mysql->prepare("UPDATE `users` SET `avatar` = ? WHERE `id` = ?");
        $prepare->bind_param('ss', $avatarPath, $_SESSION['id']);
        $prepare->execute();

        echo 'Ok';
        $prepare->close();
        $mysql->close();
      } else {
        echo 'error validation';
      }
    }

    public function getAvatar() {
      $mysql = DataBase::connectDB();
      $result = $mysql->query("SELECT `avatar` FROM `users` WHERE `id` = {$_SESSION['id']}");
      if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $avatar = $row['avatar'];
        echo $avatar;
      }
    }
  }

?>