<?php

if (!class_exists('Config'))  {
  require_once('../Config/Config.php');
}

class Database
{
  public static function getDB()
  {
    static $db = null;
    if ($db === null) {
      try
      {
        $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
        $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);  
      }
      catch(PDOException $ex) 
      { 
          die("Failed to connect to the database: " . $ex->getMessage()); 
      } 
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    return $db;
  }
  public static function exec($query, $queryParams = NULL)
  {
      $db = self::getDB();
      $statement = $db->prepare($query);
      if (empty($queryParams))  {
        $statement->execute();
      } else  {
        $statement->execute($queryParams);
      }
      if (strpos($query, 'SELECT') !== false || strpos($query, 'select') !== false || strpos($query, 'Select') !== false) {
        return $statement->fetchAll(PDO::FETCH_ASSOC);
      }
      return;
  }
}

?>