<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">
<?php require("head.php"); ?>
   <body>
      <!--headder-->
      <div class="header-outs" id="home">
      <?php require("head_bar.php"); ?>

<?php
      if(isset($_GET["pid"]) &&  $_GET["pid"] != "")
{
   $stmt = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 AND `id` = ? ");
   $stmt->bind_param("i",$_GET["pid"]);
}else
{

  header("location: shop.php");

}

   $stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();
                  $row = $result->fetch_assoc();

  ?>
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
               <li>Single Page</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--//banner -->
      <!--/shop-->
      <section class="banner-bottom py-lg-5 py-3">
         <div class="container">
            <div class="inner-sec-shop pt-lg-4 pt-3">
               <div class="row">
                  <div class="col-lg-4 single-right-left ">
                     <div class="grid images_3_of_2">
                        <div class="flexslider1">
                         <ul class="slides">
                              <li data-thumb="<?php echo $row["image1"];?>">
                                 <div class="thumb-image"> <img src="<?php echo $row["image1"];?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                              <li data-thumb="<?php echo $row["image1"];?>">
                                 <div class="thumb-image"> <img src="<?php echo $row["image1"];?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                              <li data-thumb="<?php echo $row["image1"];?>">
                                 <div class="thumb-image"> <img src="<?php echo $row["image1"];?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                           </ul>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                     <h3><?php echo $row["pname"];?></h3>
                     <p><span class="item_price">Rs. <?php echo $row["pprice"];?></span>
                        <del>Rs.  <?php echo floor($row["pprice"]*1.5);?></del>
                     </p>

                     <p>
                     <h3> Product Details </h3>
                     <?php echo $row["sdescription"];?> <hr>

                     <h3>Care Instructions</h3>
                     <?php echo $row["ldescription"];?>
                     </p>
                     <hr>


                     <div class="toys single-item hvr-outline-out">
                                       <form action="AddToCart.php" method="post">
                                          <input type="hidden" name="pname" value="<?php echo $row["pname"]; ?>">
                                          <input type="hidden" name="qty" value="1">
                                          <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                          <button type="submit">ADD TO CART
                                          </button>
                                       </form>
                                    </div>

                  <div class="clearfix"> </div>

                  <!--//tabs-->
               </div>
            </div>
         </div>
      </section>
      <!--subscribe-address-->

      </section>
      <!--//subscribe-->
      <!-- footer -->
      <?php require("footer.php") ?>
      <!-- //footer -->
      <!-- Modal 1-->

      <!-- //Modal 1-->
      <!--jQuery-->
      <script src="js/jquery-2.2.3.min.js"></script>
      <!-- newsletter modal -->
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
      <!-- single -->
      <script src="js/imagezoom.js"></script>
      <!-- single -->
      <!-- script for responsive tabs -->
      <script src="js/easy-responsive-tabs.js"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion
         		width: 'auto', //auto or any width like 600px
         		fit: true, // 100% fit in a container
         		closed: 'accordion', // Start closed if in accordion view
         		activate: function (event) { // Callback function if tab is switched
         			var $tab = $(this);
         			var $info = $('#tabInfo');
         			var $name = $('span', $info);
         			$name.text($tab.text());
         			$info.show();
         		}
         	});
         	$('#verticalTab').easyResponsiveTabs({
         		type: 'vertical',
         		width: 'auto',
         		fit: true
         	});
         });
      </script>
      <!-- FlexSlider -->
      <script src="js/jquery.flexslider.js"></script>
      <script>
         // Can also be used with $(document).ready()
         $(window).load(function () {
         	$('.flexslider1').flexslider({
         		animation: "slide",
         		controlNav: "thumbnails"
         	});
         });
      </script>
      <!-- //FlexSlider-->
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
      <!-- //smooth-scrolling-of-move-up -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->
   </body>
</html>
