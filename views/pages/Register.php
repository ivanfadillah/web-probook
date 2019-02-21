<?php
  require_once('../../Config/Config.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pathway+Gothic+One|Varela+Round|M+PLUS+Rounded+1c" rel="stylesheet">
		<link rel="stylesheet" href="../../public/css/login-register.css" type="text/css"/>
	</head>
	<body>
    <div class="container">
      <h1>REGISTER</h1>
      <form action="<?php echo Config::APP_URL . '/Controller/RegisterController.php' ?>" method="post">
        <div class="form-input-attr">
          <label for="nama">Name</label>
          <input type="text" id="nama" name="name">
          <div class="status-nama"></div>
        </div>
        <div class="form-input-attr">
          <label for="username">Username</label>
          <input type="text" id="username" name="username">
          <div class="status-username"></div>
        </div>
        <div class="form-input-attr">
          <label for="email">Email</label>
          <input type="text" id="email" name="email">
          <div class="status-email"></div>
        </div>
        <div class="form-input-attr">
          <label for="password">Password</label>
          <input type="password" id="password" name="password">
          <div class="status-password"></div>
        </div>
        <div class="form-input-attr">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword">
          <div class="status-confirmPassword"></div>
        </div>
        <div class="form-input-attr">
          <label for="address">Address</label>
          <textarea type="text" id="address" name="address"></textarea>
          <div class="status-address"></div>
        </div>
        <div class="form-input-attr">
          <label for="phoneNumber">Phone Number</label>
          <input type="text" id="phoneNumber" name="phone-number">
          <div class="status-phoneNumber"></div>
        </div>
        <div id="login-redirect">
          <a href="<?php echo Config::APP_URL . '/views/pages/Login.php' ?>">Already have an account?</a><br>
        </div>
        <div id="register-button">
          <input type="submit" name="Register" value="REGISTER">
        </div>
      <form>
    </div>
    <script src="../../public/js/Register.js"></script>
  </body>
</html>