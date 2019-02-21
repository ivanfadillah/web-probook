<?php
if(!isset($_SESSION)) {
    session_start();
}

if (class_exists('Config'))  {
  require_once(Config::DOCUMENT_ROOT . '/Model/Database.php');
} else  {
  require_once('../Model/Database.php');
}

class ReviewController  {
    public static function review($id)  {
        $query = "SELECT `id-order`,`id-book`,username, title, avatar, author
                    FROM book NATURAL JOIN `order`
                    WHERE `id-order` = ".$id;
        return Database::exec($query); 
    }

    public static function maxReview()  {
        $query = "SELECT MAX(`id-review`) AS idreview 
                    FROM review";
        return Database::exec($query); 
    }

    public static function insertreview($idreview,$idbook,$idorder)  {
        $queryInsert = "
            INSERT INTO 
            review (
                `id-review`, 
                content, 
                `id-book`, 
                username, 
                rating, 
                `id-order`
            )
            VALUES('".$idreview."',
            '".$_POST['comment']."',
            '".$idbook."',
            '".$_COOKIE['username']."',
            '".$_POST['rating']."',
            '".$idorder."'
            )";

        $queryUpdate = "
                UPDATE `order` 
                SET `flag` = 0
                WHERE username ='".$_COOKIE['username']."' AND `id-order`='".$idorder."'";

        var_dump($queryUpdate);
        try {
            Database::exec($queryUpdate);
            Database::exec($queryInsert);
        } catch (PDOException $e)  {
            $header = 'Location: '. Config::APP_URL . '/views/pages/Review.php?id-order='.$idorder;
            header($header);
            die();  
        }
        $header = 'Location: '. Config::APP_URL . '/views/pages/History.php';
        header($header);
        die();
    }
}

$sql = $_SESSION['sql'];
if(isset($_POST['Review'])){
    
    $sqlMax = ReviewController::maxReview();
    $idreview = $sqlMax[0]['idreview']+1;
    ReviewController::insertreview($idreview, $sql[0]['id-book'],$sql[0]['id-order']);
    
}
?>