<?php
    if (!class_exists('Config'))	{
        include '../Config/Config.php';
    }
    include Config::DOCUMENT_ROOT . '/Model/Database.php';

    class ProfileController	{
        public static function fetchUser($username) {
            $query = "SELECT * FROM user";
            $users = Database::exec($query);
            foreach ($users as $user) {
                if ($username == $user["username"]) {
                    return $user;
                }
            }
        }

        public static function updateUser($username) {
            $avatar = $_FILES['avatar'];
            if ($avatar['size'] != 0) {
                $imageFileType = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
                move_uploaded_file($avatar["tmp_name"], Config::DOCUMENT_ROOT . "/public/img/" . $username . "." . $imageFileType);
                $query = "UPDATE user SET avatar='" . "../../public/img/" . $username . "." . $imageFileType . "', name='"  . $_POST['name'] . "', address='" . $_POST['address'] . "', `phone-number`='" . $_POST['phone-number'] . "' WHERE username='" . $username . "'";
            } else {
                $query = "UPDATE user SET name='"  . $_POST['name'] . "', address='" . $_POST['address'] . "', `phone-number`='" . $_POST['phone-number'] . "' WHERE username='" . $username . "'";

            }
            Database::exec($query);
        }
    }

    if (isset($_POST['save']))	{
        ProfileController::updateUser($_COOKIE['username']);
        header('Location: ' . Config::APP_URL . '/views/pages/EditProfile.php');
    }
?>