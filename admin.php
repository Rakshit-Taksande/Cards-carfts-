<?php 



session_start();
require("conn.php");

if( isset($_SESSION["auth"]) && $_SESSION["auth"] == 2)
{

}
else {

session_destroy();
session_start();

  $_SESSION["msg"] = "You Do Not Have Access To This Page";
  header("location: index.php");

}


?>
<!DOCTYPE html>
<html lang="zxx">
   <?php require("head.php") ?>
   <body>
      <!--headder-->
      <div class="header-outs" id="home">
      <?php require("head_bar.php") ?>
		  </div>
         <!--//headder-->
         <!-- banner -->
         <div class="inner_page-banner one-img">
         </div>
         <!-- short -->
         <div class="using-border py-3">
            <div class="inner_breadcrumb  ml-4">
               <ul class="short_ls">
                  <li>
                     <a href="index.php">Home</a>
                     <span>/ /</span>
                  </li>
                  <li>Checkout</li>
               </ul>
            </div>
         </div>
         <!-- //short-->
         <!--Checkout-->  
         <!-- //banner -->
         <!-- top Products -->
         <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Admin Table</h3>
                     <div class="checkout-right">
                       
                     <div style="overflow-x:auto;">
                        <table class="table table-striped table-bordered table-sm " style="table-layout: fixed; width: 3000px;text-align:center;">
                           <thead>
                              <tr>
                                 <th>Sr No.</th>
                                 <th>User Name</th>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Email</th>
                                 <th>Contact Number</th>
                                 <th>Product Name</th>
                                 <th>Price</th>
                                 <th>Quantity</th>
                                 <th>Order Amount</th>
                                 <th>House No.</th>
                                 <th>Street 1</th>
                                 <th>Street 2</th>
                                 <th>Landmark</th>
                                 <th>City</th>
                                 <th>State</th>
                                 <th>Pincode</th>
                                 <th>AWB No.</th>
                                 <th>AWP Carrier</th>
                                 <th>Action</th>
                                 <th>Status</th>
                                 
                              </tr>
                           </thead>
                   <tbody>
                   
                    <?php 
                 


                     $stmt = $mysqli->prepare("SELECT * FROM `order_tbl` WHERE 1");
                     $stmt->execute();
                     $result = $stmt->get_result();
                     $stmt->close();
                      $i =1;  
                      $total=0;
                     while ($row = $result->fetch_assoc()) {                      
                 
                                                     $stmt2 = $mysqli->prepare("SELECT * FROM `userdetails` WHERE  `username` = ? ");
                                                     $stmt2->bind_param("s",$row["username"]);
                                                     $stmt2->execute();
                                                     $result2 = $stmt2->get_result();
                                                     $stmt2->close();
                                                     $row2 = $result2->fetch_assoc();


                                                     $stmt2 = $mysqli->prepare("SELECT * FROM `cart_tbl` WHERE `cartid` = ?");
                                                     $stmt2->bind_param("s",$row["cartid"]);
                                                     $stmt2->execute();
                                                     $result2 = $stmt2->get_result();
                                            

                                                     $stmt2->close();

                                                     
                                                     $stmt2 = $mysqli->prepare("SELECT * FROM `cart_tbl` WHERE `cartid` = ?");
                                                     $stmt2->bind_param("s",$row["cartid"]);
                                                     $stmt2->execute();
                                                     $result3 = $stmt2->get_result();
                                            

                                                     $stmt2->close();
                                                     
                                                     
                                                     $stmt2 = $mysqli->prepare("SELECT * FROM `cart_tbl` WHERE `cartid` = ?");
                                                     $stmt2->bind_param("s",$row["cartid"]);
                                                     $stmt2->execute();
                                                     $result4 = $stmt2->get_result();
                                            

                                                     $stmt2->close();


                                                     $stmt2 = $mysqli->prepare("SELECT * FROM `address_tbl` WHERE `addressid` = ?");
                                                     $stmt2->bind_param("s",$row["addressid"]);
                                                     $stmt2->execute();
                                                     $result5 = $stmt2->get_result();
                                                     $row5 = $result5->fetch_assoc();

                                                     $stmt2->close();
                 
                                                     ?>
                      
                   
                      <tr>
                   <td><?php echo $i++;?></td>
                   <td><?php echo $row["username"];?></td>
                   <td><?php echo $row2["firstname"];?></td>
                   <td><?php echo $row2["lastname"];?></td>
                   <td><?php echo $row2["email"];?></td>
                   <td><?php echo $row2["contactno"];?></td>
                  <td> <?php 

                   while ( $row3 = $result2->fetch_assoc())
                   { 
                    

                            echo $row3["productname"]."<br>";


                   }
                   
                   ?></td>
                   <td><?php 

while ( $row3 = $result3->fetch_assoc())
{ 
 

         echo $row3["price"]."<br>";


}

?></td>
                   <td><?php 

while ( $row3 = $result4->fetch_assoc())
{ 
 

         echo $row3["quantity"]."<br>";


}

?></td>
<td><?php echo $row["amount"]; ?></td>
                   <td><?php echo $row5["houseno"]; ?></td>
                   <td><?php echo $row5["street1"]; ?></td>
                   <td><?php echo $row5["street2"]; ?></td>
                   <td><?php echo $row5["landmark"]; ?></td>
                   <td><?php echo $row5["city"]; ?></td>
                   <td><?php echo $row5["state"]; ?></td>
                   <td><?php echo $row5["pincode"]; ?></td>
                  
                   <?php if($row["awbno"] == "") { ?>

                   <td>
                 
                   <form method="post" action="awbupdate.php">
                
                   
                   <input type="text"  class="form-control" name="awbno" required>
                   <input type="hidden" class="form-control" name="orderid" value="<?php echo $row["orderid"]; ?>" required>
                                       
                   
                   
                   </td>
                   <td> <input type="text" class="form-control" name="awbcarrier" required></td>
                   <td><button type="submit" > Update AWB </button></td>

                    </form>
                    <?php 
                    
                   }else{

                    ?>

                    <td><?php echo $row["awbno"]; ?> </td>
                    
                    <td> <?php echo $row["awbclient"]; ?> </td>
                    
                    <td> </td>


                    <?php

                   }
                    
                    ?>

                   <td><?php 
                   
                    if($row["status"] == 1)
                    {
                        echo "Order Pending";
                    }else
                    {
                        echo "Order Shipped";

                    }
                   
                   ?></td>


                   </tr>
                   <?php

                     }

                   ?>
                   
                  
                   </tbody>


                        
                        </table>
                        </div>
                     </div>
                     <div class="checkout-left">
                  
                        
                        <div class="col-md-8 address_form">
                       
                         
  
                              <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    
                              </section>
                           </form>
                           <div class="checkout-right-basket">
                              <a href="payment.php">Make a Payment </a>
                           </div>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
               <!-- //top products -->
            </div>
      </section>
     
      <!-- footer -->
      <?php require("footer.php") ?>
      <!-- //footer -->
      <!-- Modal 1-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form action="#" method="post">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="Your Name" name="Your Name" required="">
                           </div>
                           <div class="styled-input">
                              <input type="email" placeholder="Your Email" name="Your Email" required="">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="password" name="password" required="">
                           </div>
                           <button type="submit" class="btn subscrib-btnn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- //Modal 1-->
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- cart-js -->	
      <script src="js/minicart.js"></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;
         
         	if (this.subtotal() > 0) {
         		items = this.items();
         
         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!--// cart-js -->
      <!--quantity-->
      <script>
         $('.value-plus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) + 1;
         	divUpd.text(newVal);
         });
         
         $('.value-minus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) - 1;
         	if (newVal >= 1) divUpd.text(newVal);
         });
      </script>
      <!--quantity-->
      <!--closed-->
      <script>
         $(document).ready(function (c) {
         	$('.close1').on('click', function (c) {
         		$('.rem1').fadeOut('slow', function (c) {
         			$('.rem1').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close2').on('click', function (c) {
         		$('.rem2').fadeOut('slow', function (c) {
         			$('.rem2').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close3').on('click', function (c) {
         		$('.rem3').fadeOut('slow', function (c) {
         			$('.rem3').remove();
         		});
         	});
         });
      </script>
      <!--//closed-->
      <!-- start-smoth-scrolling -->
      <script src="js/move-top.js"></script>
      <script src="js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->
   </body>
</html>