<?php


session_start();
require("conn.php");

if( isset($_SESSION["auth"]) && $_SESSION["auth"] == 1)
{

}
else {

session_destroy();
session_start();

  $_SESSION["msg"] = "Please Login Before Adding Items To Cart ";
  header("location: index.php");

}

// go  back to chrome __
$ctid = $_GET["id"];

$stmt = $mysqli->prepare("UPDATE `cart_tbl`SET  `quantity` = `quantity`+1 WHERE `id` = ? AND `username` = ? AND `cartid` =  ? ");
$stmt->bind_param("iss",$ctid,$_SESSION["username"],$_SESSION["cartid"]);
$stmt->execute();

$result= $stmt->get_result();

$stmt->close();


header("location: cart.php");

?>
