<?php
class DataBase {
  public static function connectDB() {
    $mysqli = new mysqli
    (
      'localhost',
      'root',
      '', 
      'english_cards' 
    );
    if($mysqli->connect_errno) {
      die('Ошибка соединения' . $mysqli->connect_errno);
    }
    return $mysqli;
  }
}
?>