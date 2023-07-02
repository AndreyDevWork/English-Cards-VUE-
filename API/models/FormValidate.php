<?php
  class FormValidate {
    private static $nameRegex = '/^[a-zA-Zа-яА-Я\s]{2,32}$/u';
    private static $emailRegex = '/^[\w.\s-]{1,120}@[a-zA-Z0-9_-]{1,120}(?:\.[a-zA-Z0-9_-]{1,120}){1,2}$/';
    private static $passwordRegex = '/^(?=.*[a-zA-Zа-яА-Я])(?=.*[0-9])(?!.*\s).{8,48}$/u';

    public static function validateName($name) {
      if(preg_match(self::$nameRegex, $name)) {
        return true;
      } else {
        return false;
      }
    }

    public static function validateEmail($email) {
      if(preg_match(self::$emailRegex, $email)) {
        return true;
      } else {
        return false;
      }
    }
    
    public static function validatePssword($password) {
      if(preg_match(self::$passwordRegex, $password)) {
        return true;
      } else {
        return false;
      }
    }
  }


?>