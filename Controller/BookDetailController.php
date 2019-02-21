<?php

if (class_exists('Config'))  {
  require_once(Config::DOCUMENT_ROOT . '/Model/Database.php');
} else  {
  require_once('../Model/Database.php');
}

class BookDetailController  {
  public static function bookdetail()  {
    $query = "
      SELECT 
        `id-book`,
        username, 
        rating, 
        content,
        book.avatar as bookAvatar,
        user.avatar,
        title,
        description,
        author
        FROM 
        `book` 
        LEFT JOIN 
          `review` 
          USING 
            (`id-book`)
           LEFT JOIN 
              `user`
              USING (`username`)
      WHERE
        `id-book` = :idbook;";


    $queryParams = array(
      ':idbook' => $_GET['id-book']
    );
    return Database::exec($query, $queryParams);
  }
  public static function order()  {
    $query = "
      INSERT INTO 
        `order`(
          username, 
          `id-book`, 
          date, 
          quantity,
          flag
        )
      VALUES(
        :username,
        :idbook,
        NOW(),
        :quantity,
        1
      )";
    $queryParams = array(
      ':username' => $_POST['username'],
      ':idbook' => $_POST['id-book'],
      ':quantity' => $_POST['quantity']
    );
    Database::exec($query, $queryParams);
    $query2 = "
      SELECT 
        LAST_INSERT_ID();
      ";
    return Database::exec($query2);
  }
}

if ($_POST)  {
  $idorder = BookDetailController::order()[0]['LAST_INSERT_ID()'];
  header('Content-type: text/plain');
  echo $idorder;
} else  {
  $reviews = BookDetailController::bookdetail();
}

?>