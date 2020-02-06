<?php

session_start();
require("conn.php");


$pass = $_POST["Password"];
$user = $_POST["Email"];
$status = 1;

date_default_timezone_set("Asia/Kolkata");

$dateTime = date("Y-m-d H:i:s"); 


$stmt = $mysqli->prepare("SELECT `username` FROM `user_tbl` WHERE `username` = ?");
$stmt->bind_param("s",$user);
$stmt->execute();


    $result = $stmt->get_result();
$stmt->close();
    //var_dump($result);

    if($result->num_rows === 0){


                  $stmt = $mysqli->prepare("INSERT INTO `user_tbl`(`username`, `password`, `datetime`, `status`) VALUES (?,?,?,?)");
                  $stmt->bind_param("sssi",$user,$pass,$dateTime,$status);
                  $stmt->execute();
                  $stmt->close();
                  $_SESSION["msg"] = " User --  ".$user."  -- Created Successfully";
                  header("location: index.php");




    }
    else {


      $_SESSION["msg"] = " Username --  ".$user."  -- Already Exists ";
      header("location: index.php");


}



?>

