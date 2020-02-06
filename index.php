<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">
<style>
h3, h4, p{
   font-family: cursive;
}
p{
   font-size: 25px;
}
h5{
   color:black;
}
</style>

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
                              <h5 style="color:black;">Sort cards And craft works<br>as per your choice</h5>
                              <div class="bottom-info">
                                 <p style="color:black;">Crafting your Curiosity.</p>
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
       <section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about" style="background-color: #F0A698;"	>
         <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
            <h3 class="title text-center mb-lg-5 mb-md-4  mb-sm-4 mb-3">Best Products</h3>
            <div class="row banner-below-w3l">
               <div class="col-lg-4 col-md-6 col-sm-6 text-center banner-agile-flowers">
                  <img src="images/indexpage/img1.jpg" class="img-thumbnail" alt="">
                  <div class="banner-right-icon">
                     <h4 class="pt-3"><a href = "shop.php">Flower Bouquet </a></h4>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 text-center banner-agile-flowers">
                  <img src="images/indexpage/img2.jpg" class="img-thumbnail" alt="">
                  <div class="banner-right-icon">
                     <h4 class="pt-3"><a href="shop.php?cat=Cakes">Cakes</h4>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 text-center banner-agile-flowers">
                  <img src="images/indexpage/img5.jpg" class="img-thumbnail" alt="">
                  <div class="banner-right-icon">
                     <h4 class="pt-3"><a href="shop.php?cat=Mugs">Mugs</h4>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 mt-3 text-center banner-agile-flowers">
                  <img src="images/indexpage/Img4.jpg" class="img-thumbnail" alt="">
                  <div class="banner-right-icon">
                     <h4 class="pt-3"><a href="shop.php?cat=Chocolates">Chocolates</h4>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 mt-3 text-center banner-agile-flowers">
                  <img src="images/indexpage/img3.jpg" class="img-thumbnail" alt="">
                  <div class="banner-right-icon">
                     <h4 class="pt-3"><a href="shop.php?cat=Soft%20Toys">Soft Toys</h4>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 mt-3 text-center banner-agile-flowers">
                  <img src="images/indexpage/img6.jpg" class="img-thumbnail" alt="">
                  <div class="banner-right-icon">
                     <h4 class="pt-3"><a href="shop.php?cat=Cards">Greeting Cards</h4>
                  </div>
               </div>

      </section>
      <!-- //about -->
      <!--new Arrivals -->
      <section class="blog py-lg-4 py-md-3 py-sm-3 py-3" style="background-color: #D2B48C;">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3" style="color:black;" >Arriving Soon...</h3>
            <div class="slid-img">
               <ul id="flexiselDemo1">
                  <li>
                     <div class="agileinfo_port_grid">
                        <img src="images/indexpage/img7.jpg" alt=" " class="img-fluid" />
                        <div class="banner-right-icon">
                           <h4 class="pt-3">Roast and Toast Mug</h4>
                        </div>

                     </div>
                  </li>
                  <li>
                     <div class="agileinfo_port_grid">
                        <img src="images/indexpage/img8.jpg" alt=" " class="img-fluid" />
                        <div class="banner-right-icon">
                           <h4 class="pt-3">Paris Tower</h4>
                        </div>

                     </div>
                  </li>
                  <li>
                     <div class="agileinfo_port_grid">
                        <img src="images/indexpage/img9.jpg" alt=" " class="img-fluid" />
                        <div class="banner-right-icon">
                           <h4 class="pt-3">Glitter Bottles</h4>
                        </div>

                     </div>
                  </li>
                  <li>
                     <div class="agileinfo_port_grid ">
                        <img src="images/indexpage/img10.jpg" alt=" " class="img-fluid" />
                        <div class="banner-right-icon">
                           <h4 class="pt-3">Bottle Case</h4>
                        </div>

                     </div>
                  </li>
                  <li>
                     <div class="agileinfo_port_grid">
                        <img src="images/indexpage/img11.jpg" alt=" " class="img-fluid" />
                        <div class="banner-right-icon">
                           <h4 class="pt-3">Mini Lantern</h4>
                        </div>

                     </div>
                  </li>
                  <li>
                     <div class="agileinfo_port_grid ">
                        <img src="images/indexpage/img12.jpg" alt=" " class="img-fluid" />
                        <div class="banner-right-icon">
                           <h4 class="pt-3">Clock</h4>
                        </div>

                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </section>

      <!--Product-about-->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3" style="background-color: #FDF5E6;">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">About Cards & Crafts</h3>
            <div class="about-products-w3layouts">
               <p style="font-size: 18px;">Cards & Crafts,online gift store comprises of variety of gift products where you visit to the site and select the gift that you want to give to your loved ones. If you are confused about what to gift, we also provide suggestions based on top sold products.
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

            </div>


         </div>
		 </div>
      </section>

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
