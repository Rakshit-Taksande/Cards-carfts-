<?php
session_start();
require("conn.php");

// statement preparation

$stmt = $mysqli->prepare("INSERT INTO `contact_info`(`name`, `email`, `contactno`, `description`)  VALUES (?,?,?,?)");
                  $stmt->bind_param("ssss",$_POST["name"],$_POST["email"],$_POST["contactno"],$_POST["description"]);
                  $stmt->execute();
                  $stmt->close();
header("location: contactwelcome.php");
 ?>
