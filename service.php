
   <?php session_start(); ?>
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
               <li>Service</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--service -->
      <section class="service py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Services</h3>
            <div class="row text-center">
               <div class="col-lg-4 col-md-6 abut-gride">
                  <span class="fas fa-truck"></span>
                  <h5>Shipping</h5>
                  <p class="mt-3"> velit sagittis vehicula. Duis posuere
                     ex in mollis iaculis. Suspendisse tincidunt
                  </p>
               </div>
               <div class="col-lg-4 col-md-6 abut-gride">
                  <span class="fas fa-phone-volume"></span>
                  <h5>Support</h5>
                  <p class="mt-3"> velit sagittis vehicula. Duis posuere
                     ex in mollis iaculis. Suspendisse tincidunt
                  </p>
               </div>
               <div class="col-lg-4 col-md-6 abut-gride">
                  <span class="fas fa-undo"></span>
                  <h5> Return</h5>
                  <p class="mt-3"> velit sagittis vehicula. Duis posuere
                     ex in mollis iaculis. Suspendisse tincidunt
                  </p>
               </div>
               <div class="col-lg-4 col-md-6 mt-lg-4 mt-3 abut-gride">
                  <span class="fas fa-money-bill-alt"></span>
                  <h5>Online Cash</h5>
                  <p class="mt-3"> velit sagittis vehicula. Duis posuere
                     ex in mollis iaculis. Suspendisse tincidunt
                  </p>
               </div>
               <div class="col-lg-4 col-md-6 mt-lg-4 mt-3 abut-gride">
                  <span class="fas fa-exchange-alt"></span>
                  <h5>Exchange</h5>
                  <p class="mt-3"> velit sagittis vehicula. Duis posuere
                     ex in mollis iaculis. Suspendisse tincidunt
                  </p>
               </div>
               <div class="col-lg-4 col-md-6 mt-lg-4 mt-3 abut-gride">
                  <span class="fas fa-thumbs-up"></span>
                  <h5>Quality</h5>
                  <p class="mt-3"> velit sagittis vehicula. Duis posuere
                     ex in mollis iaculis. Suspendisse tincidunt
                  </p>
               </div>
            </div>
         </div>
      </section>
      <!--//service -->


      <!-- footer -->
      <?php require("footer.php") ?>
      <!-- //footer -->
      <!-- Modal 1-->
     
                  <?php

           if(isset($_SESSION["msg"]) && $_SESSION["msg"] != "")
           {

               echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> '.$_SESSION["msg"].'</div>';
               $_SESSION["msg"] = "";

           }

?>
                  <button type="submit" class="btn subscrib-btnn">Login</button>
                  <button type="button" data-toggle="modal" data-target="#exampleModal2" class="btn subscrib-btnn" >Register</button>
               </div>
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>-->
       <?php require("Loginmodals.php");?>
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
