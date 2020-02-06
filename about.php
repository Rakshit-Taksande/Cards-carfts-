
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">
<style>
.logo{
   margin-left: 0px;
}
h4, p{
   font-family:cursive;
}

</style>

<?php require("head.php");  ?>

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
               <li>About</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--About -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">

            <div class="about-innergrid-agile text-center">
               <h4>Welcome To Our Store</h4>
               <p style="font-size: x-large;" class="mb-3"><i><b>  An excuse to buy a bunch of stuff you actually don't need !!!</b></i>
               </p>
               <section class="about py-lg-4 py-md-3 py-sm-3 py-3">


            <div class="about-products-w3layouts">
               <p style="font-size: 18px;">Cards & Crafts,online gift store comprises of variety of gift products where you visit to the site and select the gift that you want to give to your loved ones. If you are confused about what to gift, we also provide suggestions based on top sold products.
 The main motto of designing this site is to make gift products online, so that it can save your money and precious time.
               </p>


         </div>
      <br>
      <br><div class="row">
         <div class="col-lg-12" style="border:1px solid black; width:1000px"><img src="images/indexpage/img1.jpg" style="width:100%;"/>
               </div>
               </div>
               </section>
            </div>
            <div class="about-sub-inner text-center mt-lg-4 mt-3">

               <div class="row">

                  <div class="col-lg-4 col-md-4 abut-gride" style="margin:auto;">
                     <span class="fas fa-phone-volume" ><a href="contact.php"></span>
                     <h5> Support</h5>
                  </div>

               </div>
            </div>
         </div>
      </section>
      <!--//about -->

      <!--//subscribe-->
    <?php require("footer.php"); ?>
      <!-- footer -->
     
      <!-- //Modal 1-->
      <script src='js/jquery-2.2.3.min.js'></script>
    <?php require("Loginmodals.php");?>
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
