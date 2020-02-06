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
  header("location: index.php");


}
else {

  $row = $result->fetch_assoc();

  if($row["type"]==1){
  $_SESSION["auth"] = 1;
  $_SESSION["username"]=$row["username"];
  $_SESSION["cartid"] = rand();

    header("location: shop.php");
  }else if($row["type"]==2)
  {
    $_SESSION["auth"] = 2;
    $_SESSION["username"]=$row["username"];
    $_SESSION["cartid"] = rand();
  
      header("location: admin.php");

  }

}

$stmt->close();




 ?>