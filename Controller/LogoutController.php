<?php

session_start();

if (class_exists('Config'))  {
  require_once(Config::DOCUMENT_ROOT . '/Model/Database.php');
} else  {
  require_once('../Model/Database.php');
}

class LogoutController  {
  public static function logout()  {
    unset($_COOKIE['username']);
    $header = "Location: " . Config::APP_URL . "/views/pages/Login.php";
    header($header);
    die();
  }
}

LogoutController::logout();

?>