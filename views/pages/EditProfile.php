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
		<title>Edit Profile</title>
		<link rel="stylesheet" href="../../public/css/global.css" type="text/css"/>
		<link rel="stylesheet" href="../../public/css/header.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../../public/css/edit-profile.css">
	</head>
	<body>
		<div class = frame>
			<?php include Config::DOCUMENT_ROOT . "/views/includes/Header.php"?>
			<h1>Edit Profile</h1>
			<form method="post" action="../../Controller/ProfileController.php" enctype="multipart/form-data">
			  <table>
			  	<tr>
			  		<th style="width:25%;"></th>
				    <th style="width:60%;"></th>
			  	</tr>
			  	<tr>
			  		<td><img id="profile-picture" src="<?php echo '../../public/img/' . $profile["avatar"]?>"></td>
			  		<td>
			  			Update profile picture
                        <input type="file" id="hidden-button" name="avatar" id="avatar">
                        <div class="form-image">
                            <input type="text" id="file-name" name="avatar-user">
                            <button type="button" onclick="submitFile()">Browse...</button>
                        </div>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>Name</td>
			  		<td>
                        <input id="nama" type="text" name="name" value="<?php echo htmlspecialchars($profile["name"]) ?>" >
                        <div class="status-nama"></div>
                    </td>

			  	<tr>
			  		<td>Address</td>
			  		<td>
                        <textarea id="address" name="address"><?php echo $profile["address"] ?></textarea>
                        <div class="status-address"></div>
                    </td>

			  	</tr>
			  	<tr>
			  		<td>Phone Number</td>
			  		<td>
                        <input id="phoneNumber" type="text" name="phone-number" value="<?php echo $profile["phone-number"] ?>" >
                        <div class="status-phoneNumber"></div>
                    </td>
                </tr>
			  </table>
			  <br>
			  <br>
			  <div id="back-button"><a href="Profile.php" style="text-decoration: none;"> Back </a></div>
			  <input type="submit" name="save" id="save-button" value="Save">
			</form> 
		</div>
        <script src="../../public/js/EditProfile.js"></script>
    </body>
</html>