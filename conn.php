<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
        $mysqli = new mysqli("localhost", "root", "", "cards & crafts");
        $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {

  $_SESSION["msg"] = "Username/Password Incorrect";
  header("location: index.php");
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}


?>