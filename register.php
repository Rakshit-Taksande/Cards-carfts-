<?php

session_start();

require('conn.php');

  $useremail= $_POST["Username"];
  // $password= md5($_POST["password"]);
  $password= $_POST["Password"];

$stmt = $mysqli->prepare("SELECT * FROM `user_tbl` WHERE `username` = ? AND `password` = ?");
$stmt->bind_param("ss", $useremail,$password);
$stmt->execute();

$result = $stmt->get_result();

//var_dump($result);

if($result->num_rows === 0){


  $_SESSION["msg"] = "Username/Password Incorrect";
  //header("location: index.php");


}
else {

  $row = $result->fetch_assoc();

  $_SESSION["auth"] = 1;
  $_SESSION["username"]=$row["username"];
  


  

    
    header("location: shop.php");
  

}

$stmt->close();




 ?>