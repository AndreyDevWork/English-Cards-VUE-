<?php
  require '../database/DataBase.php';
  require 'FormValidate.php';

  class User {
    public function signup() {
      $resN = FormValidate::validateName($_POST['name']);
      $resE = FormValidate::validateEmail($_POST['email']);
      $resP = FormValidate::validatePssword($_POST['password']);
      $authKey = bin2hex(random_bytes(16));

      if(!$resN || !$resE || !$resP) {
        die('Ошибка валидации');
      }

      $mysql = DataBase::connectDB();
      $prepare = $mysql->prepare("INSERT INTO users (email, password, auth_key) VALUES (?, ?, ?)");
      $prepare->bind_param('sss', $_POST['email'], $_POST['password'], $authKey);
      $prepare->execute();

      $prepare->close();
      $mysql->close();

      echo 'Ok';
    }

    public function login() {
      $resE = FormValidate::validateEmail($_POST['email']);
      $resP = FormValidate::validatePssword($_POST['password']);
      if(!$resE || !$resP) {
        die('Ошибка валидации');
      }


      $mysql = DataBase::connectDB();
      $prepare = $mysql->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
      $prepare->bind_param('ss', $_POST['email'], $_POST['password']);

      $prepare->execute();

      $result = $prepare->get_result();

      if($result->num_rows) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['auth_key'] = $user['auth_key'];
        echo 'Ok';
      } else {
        echo 'Неверный логин или пароль';
      }

      
      

    }
  }

?>