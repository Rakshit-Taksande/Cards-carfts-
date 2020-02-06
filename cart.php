<?php session_start();?>
<!DOCTYPE html>
<html lang="zxx">
<style>
th{
   font-family:cursive;
   font-size: 18px;
}
td{
   padding: 20px;
}
h3{
   text-align:right;
   font-family:cursive;
}
label{
   font-family:cursive;
   font-size: 18px;
}
h2{
   text-align: center;
   font-family:cursive;
}
</style>
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
                     <h2>My Cart</h2>
                     <div class="checkout-right">

                        <table class="timetable_sub" style="table-layout: fixed; width: 1000px;text-align:center;">
                           <thead>
                              <tr>
                                 <th>Sr No.</th>
                                 <th>Product</th>
                                 <th>Product Name</th>

                                 <th>Quantity</th>

                                 <th>Price</th>

                              </tr>
                           </thead>
                           <tbody>

                            <?php


    $stmt = $mysqli->prepare("SELECT * FROM `cart_tbl` WHERE `cartid` = ? AND `username` = ? AND `status` = 1 AND `quantity` > 0  ");
    $stmt->bind_param("ss",$_SESSION["cartid"],$_SESSION["username"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
     $i =1;
     $total=0;
    while ($row = $result->fetch_assoc()) {


                            ?>

                              <tr class="rem1">
                                 <td class="invert"><?php echo $i++; ?></td>

                                    <?php

                                    $stmt2 = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 AND `pname` = ? ");
                                    $stmt2->bind_param("s",$row["productname"]);
                                    $stmt2->execute();
                                    $result2 = $stmt2->get_result();
                                    $stmt2->close();
                                    $row2 = $result2->fetch_assoc();

                                    ?>


                                 <td class="invert-image"><a href="single.php?pid=<?php echo $row2["id"];?>"><img src="<?php echo $row2["image1"];?>" style="height:100px; width:100px;" alt=" " class="img-responsive"></a></td>
                                 <td class="invert">
                                    <div class="quantity">
                                       <div class="quantity-select">
                                          <div class="entry value-minus">&nbsp;</div>
                                          <div class="entry value"><span><?php echo $row2["pname"];?></span></div>
                                          <div class="entry value-plus active">&nbsp;</div>
                                       </div >
                                    </div>
                                 </td>
                                 <td>
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                       <a href="cartred.php?id=<?php echo $row["id"]?>">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                       </a>
                                       </span>

                                       <input style="text-align:center;" type="text" id="quantity" name="quantity" class="form-control input-number" value="<?php echo $row["quantity"] ?>" min="1" max="10">

                                       <span class="input-group-btn">
                                          <a href="cartinc.php?id=<?php echo $row["id"]?>">
                                          <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                          <span class="glyphicon glyphicon-plus">+</span>
                                          </button>
                                          </a>
                                       </span>
                                    </div>
                              </td>
                                <!-- <td class="invert">
                                    <div class="input-group">
                                        <a href="cartred.php?id=<?php echo $row["id"]?>">
                                       <button class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">-
                                       </button>
                                       </a>
                                    </div>
                                 </td> -->
                             <!--    <td class="invert">
                                    <div class="input-group">
                                        <input type="text" disabled  class="form-control input-number" value="<?php echo $row["quantity"] ?>" min="1" max="10">
                                    </div>
                                 </td> -->
                                <!-- <td class="inver">
                                    <div class="input-group">
                                       <a href="cartinc.php?id=<?php echo $row["id"]?>">
                                          <button class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">+</button>
                                       </a>
                                    </div>
                                </td> -->

                                <td class="invert">Rs. <?php echo $row2["pprice"]*$row["quantity"];

                                 $total = $total + $row2["pprice"]*$row["quantity"];  ?></td>
                               <br>
                           </tr>

                            <?php

                                }

                            ?>


                           </tbody>
                        </table>
                     </div>
                     <div class="checkout-left">


                        <hr>

                        <h3>Total: Rs. <?php echo $total;?></h3>
                        <br>
                        <br>
                        <div class="col-md-8 address_form border border-light rounded p-3 mb-2 bg-light text-dark mw-100 ">

                           <h2>User Details</h2>
                           <br>
                           <form action="checkoutProcessor.php" method="post" class="creditly-card-form agileinfo_form ">
                              <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">

                                       <div class="controls">
                                          <label class="control-label">First name: </label>
                                          <br>
                                          <input class="billing-address-name form-control" type="text" name="firstname" placeholder="First Name">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">Last name: </label>
                                          <br>
                                          <input class="billing-address-name form-control" type="text" name="lastname" placeholder="Last name">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">Email: </label>
                                          <br>
                                          <input class="billing-address-name form-control" type="email" name="email" placeholder="Email">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">Date of Birth:</label>
                                          <br>
                                          <input class="form-control" type="date" name="dob" placeholder="Date of Birth">
                                       </div>
                                       <br>
                                       <div class="form-group">
                                          <label class="control-label">Gender: </label><br>
			                                 <label class="form-check form-check-inline">
		                                       <input class="form-check-input" type="radio" name="optradio" value="option1">
		                                       <span class="form-check-label"> Male </span>
		                                    </label>
		                                    <label class="form-check form-check-inline">
		                                       <input class="form-check-input" type="radio" name="optradio" value="option2">
		                                       <span class="form-check-label"> Female</span>
		                                    </label>
                                          <label class="form-check form-check-inline">
		                                       <input class="form-check-input" type="radio" name="optradio" value="option2">
		                                       <span class="form-check-label"> Other</span>
		                                    </label>
	                                       </div>
                                          <div class="controls">
                                             <label class="control-label">Contact Number:</label><br>
                                             <input class="form-control" type="text" name="contact" placeholder="Contact Number">
                                          </div>
                                          <br>
                                          <br>

                           <h2>Shipping Address</h2>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">House No.: </label>
                                          <input class="billing-address-name form-control" type="text" name="houseno" placeholder="House No">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">Street 1: </label>
                                          <input class="billing-address-name form-control" type="text" name="street1" placeholder="Street 1">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">Street 2: </label>
                                          <input class="billing-address-name form-control" type="text" name="street2" placeholder="Street 2">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">Landmark(Optional): </label>
                                          <input class="billing-address-name form-control" type="text" name="landmark" placeholder="Landmark">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">City: </label>
                                          <input class="billing-address-name form-control" type="text" name="city" placeholder="City">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">State: </label>
                                          <input class="billing-address-name form-control" type="text" name="state" placeholder="State">
                                       </div>
                                       <br>
                                       <div class="controls">
                                          <label class="control-label">pincode: </label>
                                          <input class="billing-address-name form-control" type="text" name="pincode" placeholder="Pincode">
                                       </div>
                                       <br>
                                       <br>
                                       <div style="text-align: center;">
                                          <button type="submit" class="submit check_out">Proceed To Checkout</button>
                                       </div>
                                 </div>
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
