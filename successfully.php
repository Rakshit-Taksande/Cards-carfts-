<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<?php require("head.php");  ?>


   <body>
      <div class="header-outs" id="home">

       <?php require("head_bar.php"); ?>

         <!-- Slideshow 4 -->
         <div class="slider text-center">
            <div class="callbacks_container">
               <ul class="rslides" id="slider4">
                  <li>
                     <div class="slider-img one-img">
                        <div class="container">
                           <div class="slider-info ">
                              <h5>Pick The Best Gift For <br>Your loved ones</h5>
                              <div class="bottom-info">
                                 <p>A Moments of Choosing Best Gift.</p>
                              </div>
                              <div class="outs_more-buttn">
                                 <a href="about.php">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img two-img">
                        <div class="container">
                           <div class="slider-info ">
                              <h5>Sort cards And craft works<br>as per your choice</h5>
                              <div class="bottom-info">
                                 <p>Crafting your Curiosity.</p>
                              </div>
                              <div class="outs_more-buttn">
                                 <a href="about.php">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="slider-img three-img">
                        <div class="container">
                           <div class="slider-info">
                              <h5>Giving you a Best <br> Gift.</h5>
                              <div class="bottom-info">
                                 <p>Gifts for every occasion</p>
                              </div>
                              <div class="outs_more-buttn">
                                 <a href="about.php">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
            <!-- This is here just to demonstrate the callbacks -->
            <!-- <ul class="events">
               <li>Example 4 callback events</li>
               </ul>-->
            <div class="clearfix"></div>
         </div>
      </div>
      <!-- //banner -->
      <!-- about -->

      </section>
      <!-- //about -->
      <!--new Arrivals -->
      <br><br>
      <section class="blog py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3" style="padding-top:55px;">Order Placed Successfully!!!</h3>

         </div>
      </section>
      <!--//about -->

      <!--Product-about-->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">About Cards & crafts</h3>
            <div class="about-products-w3layouts">
               <p>Cards & Crafts,online gift store comprises of variety of gift products where you visit to the site and select the gift that you want to give to your loved ones. If you are confused about what to gift, we also provide suggestions based on top sold products.
 The main motto of designing this site is to make gift products online, so that it can save your money and precious time.
               </p>
            </div>
         </div>
      </section>
      <!--//Product-about-->
      <!--subscribe-address-->
      <section class="subscribe">
         <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6 col-md-6 map-info-right px-0" >
              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe> -->
            </div>


         </div>
		 </div>
      </section>
      <!--//subscribe-address-->
     
      <!--//subscribe-->
     <?php require("footer.php"); ?>
      <!-- //footer -->

      <!-- Modal 1-->
            <script src='js/jquery-2.2.3.min.js'></script>
      <?php require("Loginmodals.php");?>
      <!--js working-->

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
      <!--responsiveslides banner-->
      <script src="js/responsiveslides.min.js"></script>
      <script>
         // You can also use "$(window).load(function() {"
         $(function () {
         	// Slideshow 4
         	$("#slider4").responsiveSlides({
         		auto: true,
         		pager:false,
         		nav:true ,
         		speed: 900,
         		namespace: "callbacks",
         		before: function () {
         			$('.events').append("<li>before event fired.</li>");
         		},
         		after: function () {
         			$('.events').append("<li>after event fired.</li>");
         		}
         	});

         });


      </script>
      <!--// responsiveslides banner-->
      <!--slider flexisel -->
      <script src="js/jquery.flexisel.js"></script>
      <script>
         $(window).load(function() {
         	$("#flexiselDemo1").flexisel({
         		visibleItems: 3,
         		animationSpeed: 3000,
         		autoPlay:true,
         		autoPlaySpeed: 2000,
         		pauseOnHover: true,
         		enableResponsiveBreakpoints: true,
         		responsiveBreakpoints: {
         			portrait: {
         				changePoint:480,
         				visibleItems: 1
         			},
         			landscape: {
         				changePoint:640,
         				visibleItems:2
         			},
         			tablet: {
         				changePoint:768,
         				visibleItems: 2
         			}
         		}
         	});

         });
      </script>


      <!-- //slider flexisel -->
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
ß
   </body>
</html>
