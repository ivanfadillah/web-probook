<?php

if (class_exists('Config'))  {
  require_once(Config::DOCUMENT_ROOT . '/Model/Database.php');
} else  {
  require_once('../Model/Database.php');
}

class RegisterController  {
  public static function register()  {
    $query = "
      INSERT INTO 
        user(
          name, 
          username, 
          email, 
          password, 
          address, 
          `phone-number`
        )
      VALUES(
        :name,
        :username,
        :email,
        :password,
        :address,
        :phoneNumber
      )";
    $queryParams = array(
      ':name' => $_POST['name'],
      ':username' => $_POST['username'],
      ':email' => $_POST['email'],
      ':password' => $_POST['password'],
      ':address' => $_POST['address'],
      ':phoneNumber' => $_POST['phone-number']
    );
    try
    {
      $result = Database::exec($query, $queryParams);
    }
    catch (PDOException $e)  {
      $header = 'Location: '. Config::APP_URL . '/views/pages/Register.php';
      header($header);
      die();  
    }
    $header = 'Location: '. Config::APP_URL . '/views/pages/Login.php';
    header($header);
    die();
  }
  public static function isExist($attr, $value) {
    $query = "
      SELECT
        $attr
      FROM
        user
      WHERE
        $attr = :value
    ";
    $queryParams = array(
      ':value' => $value
    );
    $row = Database::exec($query, $queryParams)[0];
    if (empty($row))  {
      return 'Available';
    } else  {
      return 'Not Available';
    }
  }
}

if ($_GET['username'])  {
  $exist = RegisterController::isExist('username', $_GET['username']);
  header('Content-type: text/plain');
  echo $exist;
}

if ($_GET['email'])  {
  $exist = RegisterController::isExist('email', $_GET['email']);
  header('Content-type: text/plain');
  echo $exist;
}

if ($_POST['Register']) {
  RegisterController::register();
}

?>