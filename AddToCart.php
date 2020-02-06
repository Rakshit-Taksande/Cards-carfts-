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


$user = $_SESSION["username"];
$pname = $_POST["pname"];
$qty = $_POST["qty"];

$pid = $_POST["id"];

$stmt = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 AND `id` = ? ");
   $stmt->bind_param("i",$pid);
   $stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();
                  $row = $result->fetch_assoc();

                  $price = $row["pprice"];



                    
$stmt = $mysqli->prepare("SELECT * FROM `cart_tbl` WHERE `username` = ? AND `cartid` = ? AND `productname`=? ");
$stmt->bind_param("sss", $user,$_SESSION["cartid"],$pname);
$stmt->execute();

$result = $stmt->get_result();

//var_dump($result);

if($result->num_rows === 0){



                  $stmt = $mysqli->prepare("INSERT INTO `cart_tbl`( `cartid`, `username`, `productname`, `quantity`, `price`) VALUES (?,?,?,?,?)");
                  $stmt->bind_param("issss",$_SESSION["cartid"],$user,$pname,$qty,$price);
                  $stmt->execute();
                  $stmt->close();
                  
                 header("location: cart.php");

}
else
{

  $row = $result->fetch_assoc();

$stmt = $mysqli->prepare("UPDATE `cart_tbl`SET  `quantity` = `quantity`+1 WHERE `id` = ? AND `username` = ? AND `cartid` =  ? ");
$stmt->bind_param("iis",$row["id"],$_SESSION["username"],$_SESSION["cartid"]);
$stmt->execute();

$result= $stmt->get_result();

$stmt->close();
header("location: cart.php");


}

?>