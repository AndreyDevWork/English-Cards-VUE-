<?php
  require '../database/DataBase.php';
  require 'FormValidate.php';

  class User {
    public function signup() {
      $resN = FormValidate::validateName($_POST['name']);
      $resE = FormValidate::validateEmail($_POST['email']);
      $resP = FormValidate::validatePssword($_POST['password']);

      if(!$resN || !$resE || !$resP) {
        die('Ошибка валидации');
      }

      $mysql = DataBase::connectDB();
      $name = $_POST['name'];
      $status = 'Status';
      $avatar = '../upload/avatars/avatar.jpg';
      $aboutMe = NULL;
      $lastVisit = NULL;
      $email = $_POST['email'];
      $password = $_POST['password'];
      $RegDate = date('Y-m-d');
      $authKey = bin2hex(random_bytes(16));

      $prepare = $mysql->prepare("INSERT INTO `users` (name, status, avatar, about_me, last_visit, email, password,	registration_date, auth_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $prepare->bind_param('sssssssss', $name, $status, $avatar, $aboutMe, $lastVisit, $email, $password, $RegDate, $authKey);


      $prepare->execute();

      $prepare->close();
      $mysql->close();
      echo 'Ok';
    }

    public function login() {

      $mysql = DataBase::connectDB();
      $prepare = $mysql->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
      $prepare->bind_param('ss', $_POST['email'], $_POST['password']);

      $prepare->execute();

      $result = $prepare->get_result();

      if($result->num_rows) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['auth_key'] = $user['auth_key'];

        $prepareUpdate = $mysql->prepare("UPDATE `users` SET `last_visit` = ? WHERE `email` = ? AND `password` = ?");
        $prepareUpdate->bind_param('sss', date('Y-m-d H:i:s'), $_POST['email'], $_POST['password']);
        $prepareUpdate->execute();

        echo 'Ok';
      } else {
        echo 'Неверный логин или пароль';
      }

      $prepare->close();
      $prepareUpdate->close();
      $mysql->close();
    }
  }

?>