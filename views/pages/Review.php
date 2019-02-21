<?php
    session_start();
	//$_SESSION['page'] = 'History';
	include '../../Config/Config.php';
	require_once(Config::DOCUMENT_ROOT . '/Controller/ReviewController.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>History</title>
		<link rel="stylesheet" href="../../public/css/global.css" type="text/css"/>
		<link rel="stylesheet" href="../../public/css/header.css" type="text/css"/>
		<link rel="stylesheet" href="../../public/css/review.css">
	</head>
	<body>
		<div class="frame">
            <?php include Config::DOCUMENT_ROOT . "/views/includes/Header.php"?>
            <div class="margin">
            <?php
                $sql=ReviewController::review($_GET['id-order']);
                $_SESSION['sql'] = $sql;
                echo "<br>
                <img src='../../public/img/".$sql[0]["avatar"]."' width='95px' height='210px' >
                <h1 class='title-review'>".$sql[0]["title"]."</h1>
                <p class='author-review'>".$sql[0]["author"]."</p><br><br>";
            ?>
                <h2 class="rating">Add Rating</h2>
                <form action="<?php echo Config::APP_URL . '/Controller/ReviewController.php' ?>" method="post">
                    <div class="star">
                        <p class="starRate">
                            <span class="starRating">
                                <input id="rating5" type="radio" name="rating" value="5">
                                <label for="rating5">5</label>
                                <input id="rating4" type="radio" name="rating" value="4">
                                <label for="rating4">4</label>
                                <input id="rating3" type="radio" name="rating" value="3" checked>
                                <label for="rating3">3</label>
                                <input id="rating2" type="radio" name="rating" value="2">
                                <label for="rating2">2</label>
                                <input id="rating1" type="radio" name="rating" value="1">
                                <label for="rating1">1</label>
                            </span>
                        </p>
                    </div>
                    <br>
                    <h2 class="rating">Add Comment</h2>
                        <textarea rows = "4" cols="56" name="comment" id ="comment">Enter text here...
                        </textarea>
                </div>
                <div class="button">
                    <button type='submit' class ='submit'name='Review' value='REVIEW'>Submit</button>

                    <a href='History.php'><button type='submit' class ='back'>Back</button></a>
                </div>
            </form>
        </div>
    </body>
</html>