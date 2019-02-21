<?php

session_start();

if (class_exists('Config'))  {
    require_once('../Model/Database.php');
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
        $query = "SELECT * FROM book WHERE title = '$title'";
        return $result = Database::exec($query);
    }
    public static function input() {
        $query = "INSERT INTO book(id-book,title,description,author,price)";
        VALUES (1001, 'Matematika','go','kadarsah', 65000);
        return $result = Database::exec($query);
    }
}

$sql = SearchController::search();

if (sizeof($sql) > 0) {
    // output data of each row
    $i = 0;
    while($i < sizeof($sql)) {
        $row = $sql[$i];
        echo "<br><b> id: ". $row["id-book"]. " - Title: ". $row["title"]. " - Penulis " . $row["author"] . "</b><br>";
        $i++;
    }
} else {
    echo "0 results";
}

?>