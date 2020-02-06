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

$stmt = $mysqli->prepare("INSERT INTO `userdetails`( `username`, `firstname`, `lastname`, `email`, `dob`, `gender`, `contactno`) VALUES (?,?,?,?,?,?,?)");
                  $stmt->bind_param("sssssss",$_SESSION["username"],$_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["dob"],$_POST["optradio"],$_POST["contact"]);
                  $stmt->execute();
                  $stmt->close();



$stmt = $mysqli->prepare("INSERT INTO `address_tbl`( `username`, `houseno`, `street1`, `street2`, `landmark`, `city`, `state`, `pincode`) VALUES (?,?,?,?,?,?,?,?)");
                  $stmt->bind_param("ssssssss",$_SESSION["username"],$_POST["houseno"],$_POST["street1"],$_POST["street2"],$_POST["landmark"],$_POST["city"],$_POST["state"],$_POST["pincode"]);
                  $stmt->execute();
                  $stmt->close();


                  $stmt = $mysqli->prepare("SELECT * FROM `cart_tbl` WHERE `cartid` = ? AND `username` = ? AND `status` = 1 AND `quantity` > 0  ");
    $stmt->bind_param("ss",$_SESSION["cartid"],$_SESSION["username"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
     $i =1;
     $total=0;
    while ($row = $result->fetch_assoc()) {



                                    $stmt2 = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 AND `pname` = ? ");
                                    $stmt2->bind_param("s",$row["productname"]);
                                    $stmt2->execute();
                                    $result2 = $stmt2->get_result();
                                    $stmt2->close();
                                    $row2 = $result2->fetch_assoc();
                                    $total = $total + $row2["pprice"]*$row["quantity"];

    }

$stmt = $mysqli->prepare("SELECT * FROM `address_tbl` WHERE `username` = ?");
$stmt->bind_param("s", $_SESSION["username"]);
$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

$status=1;

$stmt = $mysqli->prepare("INSERT INTO `order_tbl`( `username`, `cartid`, `addressid`, `amount`, `status`) VALUES (?,?,?,?,?)");
                  $stmt->bind_param("sssss",$_SESSION["username"],$_SESSION["cartid"],$row["addressid"],$total,$status);
                  $stmt->execute();
                  $stmt->close();

                  $stmt = $mysqli->prepare("UPDATE `cart_tbl`SET  `status` = 0 WHERE `username` = ? AND `cartid` =  ? ");
$stmt->bind_param("ss",$_SESSION["username"],$_SESSION["cartid"]);
$stmt->execute();

$result= $stmt->get_result();

$stmt->close();

$_SESSION["cartid"]=rand();

header("location: successfully.php");

?>
