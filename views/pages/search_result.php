<?php
  require_once('../../Config/Config.php');

  session_start();

  if (class_exists('Config'))  {
      require_once(Config::DOCUMENT_ROOT . '/Model/Database.php');
  } else  {
      require_once('../Model/Database.php');
  }

class SearchController  {
    public static function search(){
        if(isset($_POST['title'])){
            $title = $_POST['title'];
        } else {
            echo "not assign";
        }
        $query = "SELECT 'id-book', title, author, description, AVG(rating) AS rating, COUNT(username) AS user  
                  FROM book NATURAL JOIN review
                  GROUP BY book.title";
        return $result = Database::exec($query);
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <title>Search Result</title>
      <link rel="stylesheet" href="../../public/css/search_result.css" type="text/css"/>
    </head>
    <body>
        <div class = "frame">
        <?php include Config::DOCUMENT_ROOT . "/views/includes/Header.php"?>
        <?php
              $sql = SearchController::search();
              if (sizeof($sql) > 0) {
                  // output data of each row
                  $i = 0;
                  $sum = 0;
                  while($i < sizeof($sql)) {
                      $row = $sql[$i];
                      $string = "/ ".$_POST['title']."\b/i";
                      $string2 = "/\\".$_POST['title']."\b/i";
                      $retval = preg_match($string, $row["title"])||preg_match($string2, $row["title"]);
                        if($retval===true) { 
                            $result[$sum] = $row;
                            $sum++;
                        } 
                        $i++;
                  }
              } else {
                  echo "0 results";
              }

              echo "<br><h1 class='search'>Search Result<span class='result'>found <u>".$sum."</u> result(s)</span></h1><br><br><br><br>";
              if ($sum == 0) {
                  echo "Not Found";
              } else {
                $i = 0;
                while($i < sizeof($result)) {
                    $row = $result[$i];
                    echo "
                    <div><img src='tayo.jpg' width='90px' height='110px' align='left'>
                        <b class='title'>". $row["title"]. "</b><br>
                        <b class='author'>" . $row["author"] . "- ".number_format((float)$row["rating"],1,'.','')."/5.0 (".$row["user"]." votes)
                        </b><br><span class='description'>". $row["description"]."</span><br>
                        <button type='submit' class ='button'>Detail</button><br><br><br><br>
                    </div>";
                    $i++;
              }
            }
          ?>
          </div> 
    </body>


</html>

