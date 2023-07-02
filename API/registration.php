<?php
header("Access-Control-Allow-Origin: http://localhost:8081");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
// Получить данные из тела запроса
// Получить данные из $_POST
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Создать ассоциативный массив с данными
$data = array(
  'name' => $name,
  'email' => $email,
  'password' => $password
);

// Преобразовать массив в JSON
$jsonData = json_encode($data);

// Вывести JSON в ответе
echo $jsonData;
?>