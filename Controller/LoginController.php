<?php

session_start();

if (class_exists('Config'))  {
  require_once(Config::DOCUMENT_ROOT . '/Model/Database.php');
} else  {
  require_once('../Model/Database.php');
}

class LoginController  {
  public static function login()  {
    $query = "
      SELECT * 
      FROM user
      WHERE
        username = :username";
    $queryParams = array(
      ':username' => $_POST['username']
    );
    $user = Database::exec($query, $queryParams)[0];
    if ($user['password'] === $_POST['password']) {
      setcookie('username', $user['username'], 0, '/');
      $header = "Location: " . Config::APP_URL . "/views/pages/Search.php";
    } else  {
      $header = "Location: " . Config::APP_URL . "/views/pages/Login.php";
    }
    header($header);
    die();
  }
}

if ($_POST['Login'])  {
  LoginController::login();
}

?>