// DB Connection ( Conn File )

<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
        $mysqli = new mysqli("localhost", "skyihr_db_user", "!Rocketman!1316", "skyihr");
        $mysqli->set_charset("utf8mb4");
} catch(Exception $e) {

  $_SESSION["msg"] = "Username/Password Incorrect";
  header("location: index.php");
  error_log($e->getMessage());
  exit('Error connecting to database'); //Should be a message a typical user could understand
}


?>
------------------------------------------------------------##############--------------------------------------------------------------


// Displaying Ddynamic Drop Downs

<select required name="ReportingTo" class="form-control">
					<option selected disabled value="">Please Select User</option>
						<option value="Admin">N.A.</option>
						<?php

						$stmt = $mysqli->prepare("SELECT * FROM `users` WHERE `Type` BETWEEN 1 AND 3");
						$stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();
							while ($row = $result->fetch_assoc()) {

						?>

						<option value="<?php echo $row["Username"];?>"><?php echo $row["Fname"]." ".$row["Lname"]." - ".$row["Designation"]." - ".$row["Dept"];?></option>

            <?php
							}

						?>
</select>

------------------------------------------------------------##############--------------------------------------------------------------

// Adding Records In a table

<?php

require("admin_auth.php");

require("conn.php");



$dept = $_POST["Dept"];
$pass = $_POST["password"];
$user = $_POST["Username"];

$Fname = $_POST["Fname"];
$Lname = $_POST["Lname"];
$Type = $_POST["Type"];
$ReportingTo = $_POST["ReportingTo"];
$Doj = $_POST["Doj"];
$Empcode = $_POST["Empcode"];
$Designation = $_POST["Designation"];
$Level = $_POST["Level"];
$Status = 1;
$Grade = $_POST["Grade"];

$stmt = $mysqli->prepare("SELECT `Username` FROM `users` WHERE `Username` = ?");
$stmt->bind_param("s",$user);
$stmt->execute();


    $result = $stmt->get_result();
$stmt->close();
    //var_dump($result);

    if($result->num_rows === 0){


                  $stmt = $mysqli->prepare("INSERT INTO `users`(`Grade`,`Username`, `password`, `Type`, `Fname`, `Lname`, `Empcode`, `DoJ`, `Dept`, `ReportingTo`, `Designation`, `Level`, `Status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                  $stmt->bind_param("sssissssssssi",$Grade,$user,$pass,$Type,$Fname,$Lname,$Empcode,$Doj,$dept,$ReportingTo,$Designation,$Level,$Status);
                  $stmt->execute();
                  $stmt->close();
                  $_SESSION["msg"] = " User --  ".$user."  -- Created Successfully";
                  header("location: user_management.php");




    }
    else {


      $_SESSION["msg"] = " Username --  ".$user."  -- Already Exists ";
      header("location: create_user.php");


}



?>

------------------------------------------------------------##############--------------------------------------------------------------

// Auth File

<?php

session_start();

if( isset($_SESSION["type"]) && $_SESSION["type"] == 0)
{

}
else {

session_destroy();
session_start();

  $_SESSION["msg"] = "Sorry You Do Not Have Access to This Page ";
  header("location: index.php");

}


?>

------------------------------------------------------------##############--------------------------------------------------------------
// Login and Auth

<?php

session_start();

require('conn.php');

  $useremail= $_POST["username"];
  // $password= md5($_POST["password"]);
  $password= $_POST["password"];

$stmt = $mysqli->prepare("SELECT * FROM `users` WHERE `Username` = ? AND `Password` = ?");
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

  $_SESSION["auth"] = 1;
  $_SESSION["username"]=$row["Username"];
  $_SESSION["type"] = $row["Type"];


  if($row["Type"] == 0)
  {
      header("location: admin_home.php");
  }else {

    $_SESSION["dept"] = $row["dept"];
    header("location: user_home.php");
  }

}

$stmt->close();




 ?>
------------------------------------------------------------##############--------------------------------------------------------------
// Logout

<?php

session_start();
session_destroy();

header("location: index.php");

?>


------------------------------------------------------------##############--------------------------------------------------------------
// Displaying Error / Session Messaes

<?php

                    if(isset($_SESSION["msg"]) && $_SESSION["msg"] != "")
                    {

                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> '.$_SESSION["msg"].'</div>';
                        $_SESSION["msg"] = "";

                    }

?>
------------------------------------------------------------##############--------------------------------------------------------------
// Paaaword Reset

<?php

	require("se_auth.php");
	require("conn.php");


       	  $stmt = $mysqli->prepare("SELECT * FROM `users` WHERE `Username` = ? AND `Password` = ?");
          $stmt->bind_param("ss",$_SESSION["username"],$_POST["oldpass"]);
          $stmt->execute();

 	  $result= $stmt->get_result();

          $stmt->close();

           $count = $result->num_rows;

           if($count != 0)
           {

           	if($_POST["newpass"] == $_POST["rnewpass"])
           	{

           		 $stmt = $mysqli->prepare("UPDATE `users` SET `password` = ? WHERE `Username` = ?");
         		 $stmt->bind_param("ss",$_POST["newpass"],$_SESSION["username"]);
         		 $stmt->execute();

 	 		 $result= $stmt->get_result();

          		$stmt->close();

          	$_SESSION["msg"] = " Password Updated Successfully !";
      	   		header("location: changepass.php");


           	}
           	else
           	{

           		$_SESSION["msg2"] = " Sorry New Password Didn`t Match Re-Entered Password, Please Try Again.... ";
      	   		header("location: changepass.php");

           	}


           }
           else
           {

           $_SESSION["msg2"] = " Sorry Current Password Didn`t Match Your Account, Please Try Again.... ";
      	   header("location: changepass.php");




           }



?>
------------------------------------------------------------##############--------------------------------------------------------------
// Deleting Records

<?php

require("admin_auth.php");

require("conn.php");


$did = $_GET["id"];


            $stmt = $mysqli->prepare("DELETE FROM `catg` WHERE `id` = ? ");
            $stmt->bind_param("i",$did);
            $stmt->execute();
            $stmt->close();


header("location: admin_category.php");


?>
------------------------------------------------------------##############--------------------------------------------------------------
// Mail Sender

<?php

//var_dump($_POST);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//var_dump($_POST);

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'sg2plcpnl0128.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@merakipreschool.com';                 // SMTP username
    $mail->Password = '!Rocketman!121';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@merakipreschool.com', 'Info @ Meraki Pre-School');
    $mail->addBCC('krushna.suraj@gmail.com');     // Add a recipient
    $mail->addBCC('abhilashstar121@gmail.com');
    $mail->addAddress('info@merakipreschool.com', 'Info @ Meraki Pre-School');
    $mail->addAddress('vaishalishelke27@gmail.com', 'Vaishali Shelke');
     // Add a recipient
    $mail->addReplyTo('info@merakipreschool.com', 'Info @ Meraki Pre-School');



date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y h:i:s a', time());

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Enquiry Mail '.$date.' | Meraki Pre-School | From '.$_POST["cpname"];


   $mail->AddEmbeddedImage('img/logo.png', 'logo_2u');
    $mail->Body    = '

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}

		.ie-browser table {
			table-layout: fixed;
		}

		[owa] .img-container div,
		[owa] .img-container button {
			display: block !important;
		}

		[owa] .fullwidth button {
			width: 100% !important;
		}

		[owa] .block-grid .col {
			display: table-cell;
			float: none !important;
			vertical-align: top;
		}

		.ie-browser .block-grid,
		.ie-browser .num12,
		[owa] .num12,
		[owa] .block-grid {
			width: 500px !important;
		}

		.ie-browser .mixed-two-up .num4,
		[owa] .mixed-two-up .num4 {
			width: 164px !important;
		}

		.ie-browser .mixed-two-up .num8,
		[owa] .mixed-two-up .num8 {
			width: 328px !important;
		}

		.ie-browser .block-grid.two-up .col,
		[owa] .block-grid.two-up .col {
			width: 246px !important;
		}

		.ie-browser .block-grid.three-up .col,
		[owa] .block-grid.three-up .col {
			width: 246px !important;
		}

		.ie-browser .block-grid.four-up .col [owa] .block-grid.four-up .col {
			width: 123px !important;
		}

		.ie-browser .block-grid.five-up .col [owa] .block-grid.five-up .col {
			width: 100px !important;
		}

		.ie-browser .block-grid.six-up .col,
		[owa] .block-grid.six-up .col {
			width: 83px !important;
		}

		.ie-browser .block-grid.seven-up .col,
		[owa] .block-grid.seven-up .col {
			width: 71px !important;
		}

		.ie-browser .block-grid.eight-up .col,
		[owa] .block-grid.eight-up .col {
			width: 62px !important;
		}

		.ie-browser .block-grid.nine-up .col,
		[owa] .block-grid.nine-up .col {
			width: 55px !important;
		}

		.ie-browser .block-grid.ten-up .col,
		[owa] .block-grid.ten-up .col {
			width: 60px !important;
		}

		.ie-browser .block-grid.eleven-up .col,
		[owa] .block-grid.eleven-up .col {
			width: 54px !important;
		}

		.ie-browser .block-grid.twelve-up .col,
		[owa] .block-grid.twelve-up .col {
			width: 50px !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media only screen and (min-width: 520px) {
			.block-grid {
				width: 500px !important;
			}

			.block-grid .col {
				vertical-align: top;
			}

			.block-grid .col.num12 {
				width: 500px !important;
			}

			.block-grid.mixed-two-up .col.num3 {
				width: 123px !important;
			}

			.block-grid.mixed-two-up .col.num4 {
				width: 164px !important;
			}

			.block-grid.mixed-two-up .col.num8 {
				width: 328px !important;
			}

			.block-grid.mixed-two-up .col.num9 {
				width: 369px !important;
			}

			.block-grid.two-up .col {
				width: 250px !important;
			}

			.block-grid.three-up .col {
				width: 166px !important;
			}

			.block-grid.four-up .col {
				width: 125px !important;
			}

			.block-grid.five-up .col {
				width: 100px !important;
			}

			.block-grid.six-up .col {
				width: 83px !important;
			}

			.block-grid.seven-up .col {
				width: 71px !important;
			}

			.block-grid.eight-up .col {
				width: 62px !important;
			}

			.block-grid.nine-up .col {
				width: 55px !important;
			}

			.block-grid.ten-up .col {
				width: 50px !important;
			}

			.block-grid.eleven-up .col {
				width: 45px !important;
			}

			.block-grid.twelve-up .col {
				width: 41px !important;
			}
		}

		@media (max-width: 520px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
<style id="media-query-bodytag" type="text/css">
@media (max-width: 520px) {
  .block-grid {
    min-width: 320px!important;
    max-width: 100%!important;
    width: 100%!important;
    display: block!important;
  }
  .col {
    min-width: 320px!important;
    max-width: 100%!important;
    width: 100%!important;
    display: block!important;
  }
  .col > div {
    margin: 0 auto;
  }
  img.fullwidth {
    max-width: 100%!important;
    height: auto!important;
  }
  img.fullwidthOnMobile {
    max-width: 100%!important;
    height: auto!important;
  }
  .no-stack .col {
    min-width: 0!important;
    display: table-cell!important;
  }
  .no-stack.two-up .col {
    width: 50%!important;
  }
  .no-stack.mixed-two-up .col.num4 {
    width: 33%!important;
  }
  .no-stack.mixed-two-up .col.num8 {
    width: 66%!important;
  }
  .no-stack.three-up .col.num4 {
    width: 33%!important
  }
  .no-stack.four-up .col.num3 {
    width: 25%!important
  }
}
</style>
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; border-collapse: collapse;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top;;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; border-collapse: collapse;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 1px solid #BBBBBB;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<div align="center" class="img-container center autowidth fullwidth">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="cid:logo_2u" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; border: 0; height: auto; float: none; width: 100%; max-width: 500px; display: block;" title="Image" width="500"/>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; border-collapse: collapse;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 1px solid #BBBBBB;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="font-size: 12px; line-height: 14px; color: #555555; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
<p style="font-size: 14px; line-height: 16px; text-align: center; margin: 0;"><span style="text-decoration: underline; font-size: 14px; line-height: 16px;"><strong><span style="font-size: 18px; line-height: 21px;">NEW ENQUIRY RECEIVED</span></strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; border-collapse: collapse;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 1px solid #BBBBBB;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="font-size: 12px; line-height: 14px; color: #555555; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">


<p style="font-size: 14px; line-height: 16px; margin: 0;">New Enquiry Received at www.merakipreschool.com</p>
<p style="font-size: 14px; line-height: 16px; margin: 0;"></p>
<p style="font-size: 14px; line-height: 16px; margin: 0;">Please Contact : '.$_POST["cpname"].'</p>
<p style="font-size: 14px; line-height: 16px; margin: 0;">Mobile No. TEST : '.$_POST["phono"].'</p>
<p style="font-size: 14px; line-height: 16px; margin: 0;">Email : '.$_POST["email"].'</p>
<p style="font-size: 14px; line-height: 16px; margin: 0;">Subject : '.$_POST["sub"].'</p>
<p style="font-size: 14px; line-height: 16px; margin: 0;">Message : '.$_POST["msg"].'</p>

</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; border-collapse: collapse;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 1px solid #BBBBBB;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<p style="font-size: 12px; line-height: 14px; text-align: center; color: #555555; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; margin: 0;">© Meraki Pre-School 2019</p>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; border-collapse: collapse;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 1px solid #BBBBBB; height: 0px;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>





    ';


     $mail->AltBody = 'Please Contact - <br>  '.$_POST["cpname"].' <br> E-mail : '.$_POST["email"].'  <br>Subject :'.$_POST["sub"].'  <br>Messge '.$_POST["msg"].' <br> Please Contact ASAP  ';

   if($_POST["cpname"] != ""){

    $mail->send();

   }

     echo 'Message has been sent';





} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


?>
------------------------------------------------------------##############--------------------------------------------------------------
