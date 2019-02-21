<?php
	include '../../Config/Config.php';
	include '../../Controller/ProfileController.php';
	session_start();
	$_SESSION['page'] = 'Profile';
	if (empty($_COOKIE['username'])) {
		header('Location: Login.php');
		die();
	} else {
		$profile = ProfileController::fetchUser($_COOKIE['username']);	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="../../public/css/global.css" type="text/css"/>
		<link rel="stylesheet" href="../../public/css/header.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../../public/css/profile.css">
	</head>
	<body>
		<div class = frame>	
			<?php include Config::DOCUMENT_ROOT . "/views/includes/Header.php"?>
			<div class="upperBox">
				<div>
					<a href="EditProfile.php"> <img id="edit-profile-logo" src="../../public/img/edit-profile-logo.png"></a>
				</div>
				<br>
				<img src="<?php echo "../../public/img/".$profile["avatar"]?>" alt="Avatar" class="avatar">

				<h2 class="profileTitle"><?php echo $profile["name"] ?></h2>
				<br>
			</div>
			<h1 class="profile-header">My Profile</h1>
			<table id="profileTable">
			  <tr>
			    <td style="width:10%;"><img src="../../public/img/username-logo.png" class="logo"></td>
			    <td style="width:45%;">Username</td>
			    <td style="width:45%;"><?php echo $profile["username"] ?></td>
			  </tr>
			  <tr>
			  	<td><img src="../../public/img/email-logo.png" class="logo"></td>
			    <td>Email</td>
			    <td><?php echo $profile["email"] ?></td>
			  </tr>
			  <tr>
			  	<td><img src="../../public/img/address-logo.png" class="logo"></td>
			    <td>Address</td>
			    <td><?php echo $profile["address"] ?></td>
			  </tr>
			  <tr>
			  	<td><img src="../../public/img/phone-logo.png" class="logo"></td>
			    <td>Phone Number</td>
			    <td><?php echo $profile["phone-number"] ?></td>
			  </tr>
			</table>
		</div>


	</body>
</html>
