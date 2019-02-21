<?php
  require_once('../../Config/Config.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pathway+Gothic+One|Varela+Round|M+PLUS+Rounded+1c" rel="stylesheet">
		<link rel="stylesheet" href="../../public/css/login-register.css" type="text/css"/>
	</head>
	<body>
    <div class="container">
      <h1>LOGIN</h1>
      <form action="<?php echo Config::APP_URL . '/Controller/LoginController.php' ?>" method="post">
        <div class="form-input-attr-login">
          <label for="username">Username</label>
          <input type="text" id="username" name="username">
        </div>
        <div class="form-input-attr-login">
          <label for="password">Password</label>
          <input type="password" id="password" name="password">
        </div>
        <div id="register-redirect">
          <a href="<?php echo Config::APP_URL . '/views/pages/Register.php' ?>">Don't have an account?</a><br>
        </div>
        <div id="login-button">
          <input type="submit" name="Login" value="LOGIN">
        </div>
      <form>
    </div>
  </body>
<html>