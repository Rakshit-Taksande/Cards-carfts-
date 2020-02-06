   <?php session_start();

   require("conn.php");

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
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.php">Home</a>
                  <span>/ /</span>
               </li>
               <li>Products</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--show Now-->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Gifts Shop</h3>
            <div class="row">
               <div class="side-bar col-lg-3">
                  <div class="search-hotel">
                     <h3 class="agileits-sear-head">Search Here..</h3>
                     <form action="#" method="post">
                        <input type="search" placeholder="Product name..." name="search" required="">
                        <input type="submit" value=" ">
                     </form>
                  </div>
							<!-- price range -->
							<div class="range">
								<h3 class="agileits-sear-head">Price range</h3><br>
								<ul class="dropdown-menu6">

									<li>

										<div id="slider-range"></div>
										<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
									</li>
								</ul>
							</div>
							<!-- //price range -->
                  <!--preference -->
                  <div class="left-side border" style="padding-left:22px">
                     <h3 class="agileits-sear-head">Categories</h3>
                     <ul>
                        <li>
                           <input type="checkbox" class="checked">
                           <span class="span">Chocolates</span>
                        </li>
                        <li>
                           <input type="checkbox" class="checked">
                           <span class="span">Mugs</span>
                        </li>
                        <li>
                           <input type="checkbox" class="checked">
                           <span class="span">Soft Toys</span>
                        </li>
                        <li>
                           <input type="checkbox" class="checked">
                           <span class="span">Cards</span>
                        </li>
                        <li>
                           <input type="checkbox" class="checked">
                           <span class="span">Cakes</span>
                        </li>
                        <li>
                           <input type="checkbox" class="checked">
                           <span class="span">Flowers</span>
                        </li>
                     </ul>

                     <input type="submit" value="Submit">
                  </div>

<!-- //Modal 1-->

<script src='js/jquery-2.2.3.min.js'></script>
<?php require("Loginmodals.php");?>
                  <!-- //discounts -->


                  <!-- //deals -->
               </div>
               <div class="left-ads-display col-lg-9">
                  <div class="row">

                  <?php

						$stmt = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 ORDER by RAND()");
						$stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();
							while ($row = $result->fetch_assoc()) {

						?>

                  <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                        <div class="product-toys-info">
                           <div class="men-pro-item">
                              <div class="men-thumb-item">
                                 <img src="<?php echo $row["image1"]?>" class="img-thumbnail" alt="">
                                 <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                       <a href="#" class="link-product-add-cart">Quick View</a>
                                    </div>
                                 </div>
                                 <span class="product-new-top">New</span>
                              </div>
                              <div class="item-info-product">
                                 <div class="info-product-price">
                                    <div class="grid_meta">
                                       <div class="product_price">
                                          <h4>
                                             <a href="single.php"><?php echo $row["pname"] ?></a>
                                          </h4>
                                          <div class="grid-price mt-2">
                                             <span class="money ">Rs.<?php echo $row["pprice"]?></span>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="toys single-item hvr-outline-out">
                                       <form action="#" method="post">
                                          <input type="hidden" name="cmd" value="_cart">
                                          <input type="hidden" name="add" value="1">
                                          <input type="hidden" name="toys_item" value="toys (Grey)">
                                          <input type="hidden" name="amount" value="67.00">
                                          <button type="submit" class="toys-cart ptoys-cart">
                                          <i class="fas fa-cart-plus"></i>
                                          </button>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>

                  <?php

                     }

                     ?>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- //show Now-->


      
      <!--//subscribe-->
      <!-- footer -->
      <?php require("footer.php") ?>
      <!-- //footer -->
      <!-- Modal 1-->

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
      <!-- //cart-js -->
      <!-- price range (top products) -->
      <script src="js/jquery-ui.js"></script>
      <script>
         //<![CDATA[
         $(window).load(function () {
         	$("#slider-range").slider({
         		range: true,
         		min: 0,
         		max: 9000,
         		values: [50, 6000],
         		slide: function (event, ui) {
         			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
         		}
         	});
         	$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

         }); //]]>
      </script>
      <!-- //price range (top products) -->
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
      <!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
   </body>
</html>
