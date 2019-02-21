<?php
  require_once('../../Config/Config.php');
  include Config::DOCUMENT_ROOT . '/Controller/BookDetailController.php';
  $_SESSION['page'] = 'Search';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Detail</title>
		<link rel="stylesheet" href="../../public/css/global.css" type="text/css"/>
		<link rel="stylesheet" href="../../public/css/header.css" type="text/css"/>
    <link rel="stylesheet" href="../../public/css/book-detail.css" type="text/css"/>
	</head>
  <body>
    <div class="frame">
      <?php include Config::DOCUMENT_ROOT . "/views/includes/Header.php";?>
      <div class="container">
        <div class="flex-container">
          <div class="description">
            <h1><?php echo $reviews[0]['title'] ?></h1>
            <h3><?php echo $reviews[0]['author'] ?></h3>
            <div class="desc"><?php echo $reviews[0]['description'] ?></div>
          </div>
          <div class="image-rating">
            <img src="<?php echo '../../public/img/' . $reviews[0]['bookAvatar']?>" alt="foto-buku">
            <br><br><br><br><br><br><br><br>
            <div class="rating">
              <?php
                if($reviews[0]['rating'] < 3) {
                  if($reviews[0]['rating'] >= 2 ) {
                    echo "<img src='../../public/img/star2.jpg' alt='foto-buku' class='star_png'>";
                  } elseif($reviews[0]['rating'] >= 1) {
                    echo "<img src='../../public/img/star1.jpg' alt='foto-buku'class='star_png'>";
                  } else{
                    echo "<img src='../../public/img/star0.jpg' alt='foto-buku'class='star_png'>";
                  }
                } else {
                  if($reviews[0]['rating'] < 4) {
                    echo "<img src='../../public/img/star3.jpg' alt='foto-buku' class='star_png'>";
                  } elseif ($reviews[0]['rating'] < 5) {
                    echo "<img src='../../public/img/star4.jpg' alt='foto-buku' class='star_png'>";
                  } else {
                    echo "<img src='../../public/img/star5.jpg' alt='foto-buku' class='star_png'>";
                  }
                }

                echo "<div class='rate'>".number_format((float)$reviews[0]['rating'],1,'.','')."/5.0</div>";
                  
              ?>
            </div>
          </div>               
        </div>
        <form action="<?php echo Config::APP_URL . '/Controller/BookDetailController.php' ?>" method="post">
          <div class="judul-order">Order</div>
          <div class="form-input-attr">
            <label for="quantity">Jumlah:</label>
            <select name="quantity" id="quantity">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="4">5</option>
              <option value="4">6</option>
              <option value="4">7</option>
            </select>
          </div>
          <div id="order-button">
            <input type="submit" value="Order" name="Order">
          </div>
          <input type="hidden" value="<?php echo $_GET['id-book']?>" name="idbook" id="idbook">
          <input type="hidden" value="<?php echo $_COOKIE['username']?>" name="username" id="username">
        </form>
        <div id="myModal" class="modal">
          <div class="modal-capsul">
            <div class="modal-content">
              <div class="close">&times;</div>
                <div class="flex-message">
                  <div class="img-success">
                    <img src="../../public/img/success.png" alt="foto-buku">
                  </div>
                  <div class="message">
                    <div class="message-header"></div>
                    <div class="message-content"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="review">
          <div class="judul-review">Review</div>
          <table>
            <tr>
              <th style="width: 15%"></th>
              <th style="width: 50%"></th>
              <th style="width: 25%"></th>
            </tr>
            <?php
              foreach ($reviews as $review) {
                echo $view = 
                "<tr>
                  <td>
                    <img src=" . '../../public/img/' . $review['avatar'] . " alt='No Review'>
                  </td>
                  <td>
                    <h3>". $review['username']."</h3>
                    ". $review['content']."
                  <td>
                  <td>
                    <img src='../../public/img/star-on1.png' alt='tesdoang' calss = 'imagerev'><br><span class='ratingrev'>". number_format((float)$review['rating'],1,'.','')."/5.0</span>
                  <td>
                </tr>";
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <script src="../../public/js/BookDetail.js"></script>
  </body>
</html>