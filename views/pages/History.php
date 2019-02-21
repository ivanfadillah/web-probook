<?php
	session_start();
	$_SESSION['page'] = 'History';
	include '../../Config/Config.php';
	require_once(Config::DOCUMENT_ROOT . '/Controller/HistoryController.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>History</title>
		<link rel="stylesheet" href="../../public/css/global.css" type="text/css"/>
		<link rel="stylesheet" href="../../public/css/header.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="../../public/css/history.css"/>
	</head>
	<body>
		<div class="frame">
            <?php include Config::DOCUMENT_ROOT . "/views/includes/Header.php"?>
			<h1 class="history-header">History</h1>
			<?php
                $orders = HistoryController::fetchOrder($_COOKIE['username']);
                foreach ($orders as $order) {
                    if($order['flag'] == 1) {
                        $Reviewed = 'Belum direview';
                        $Reviewbutton = '<a href="Review.php?id-order='.$order['id-order'].'" class="review-button"><button type="submit" class ="button">Review</button></a>';
                    } else {
                        $Reviewed = 'Anda sudah memberikan review';
                        $Reviewbutton = '';
                    }
                    echo    "<br><br><div>
                                <div class='row'>
                                    <div class='avatar-collumn'>
                                        <div class='avatar'>
                                            <img src='../../public/img/${order['avatar']}'>
                                        </div>
                                    </div>
                                    <div class='description'>
                                        <h2>${order['title']}</h2>
                                        <p>Jumlah: ${order['quantity']}</p><br>
                                        <p>$Reviewed</p>
                                        <br>$Reviewbutton<br>
                                    </div><br>
                                    <div class='details'>
                                        <div class='date'>${order['date']}</div>
                                        <div class='date'>Nomor Order : #${order['id-order']}</div>
                                    </div><br>
                                </div>
                                <br><br>
                            </div>";
                }
            ?>
		</div>
	</body>
</html>
