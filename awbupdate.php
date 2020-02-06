<?php 



session_start();
require("conn.php");

if( isset($_SESSION["auth"]) && $_SESSION["auth"] == 2)
{

}
else {

session_destroy();
session_start();

  $_SESSION["msg"] = "You Do Not Have Access To THis Page";
  header("location: index.php");

}

$stmt = $mysqli->prepare("UPDATE `order_tbl` SET `awbno`= ? ,`awbclient`= ?,`status` = 2     WHERE `orderid` = ?  ");
$stmt->bind_param("ssi",$_POST["awbno"],$_POST["awbcarrier"],$_POST["orderid"]);
$stmt->execute();

$result= $stmt->get_result();

$stmt->close();

//var_dump($_POST);
header("location: admin.php");




?>