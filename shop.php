<?php

session_start();

//var_dump($_POST);

   ?>
   <!DOCTYPE html>
<html lang="zxx">
<?php require("head.php") ?>


   <body>
      <!--headder-->
      <div class="header-outs" id="home">
      <?php require("head_bar.php") ;



if(isset($_GET["cat"]) &&  $_GET["cat"] != "")
{
   $stmt = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 AND `category` = ? ORDER by RAND()");
   $stmt->bind_param("s",$_GET["cat"]);
}else if(isset($_POST["searchparam"]) &&  $_POST["searchparam"] != "")
{

   $tos = "%".$_POST["searchparam"]."%";
   $stmt = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 AND `category` LIKE ? OR `pname` LIKE ? ");
   $stmt->bind_param("ss",$tos,$tos);

}
else if(isset($_POST["pricemin"]) &&  $_POST["pricemin"] != "")
{


   $stmt = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 AND CAST(`pprice` AS UNSIGNED INTEGER)  >= ? AND  CAST(`pprice` AS UNSIGNED INTEGER) <= ? ");
   $stmt->bind_param("ss",$_POST["pricemin"],$_POST["pricemax"]);

}
else if(isset($_POST["categ"]) &&  $_POST["categ"] != "")
{

   $i=count($_POST["categ"]) ;

   $query = "SELECT * FROM `product_tbl` WHERE `status` = 1 AND ";

$i--;
   while($i>=0)
   {
      $query = $query."`category` = '".$_POST["categ"][$i]."' ";
      if($i!=0)
      {

         $query = $query." OR ";

      }
      $i--;
   }


 $stmt = $mysqli->prepare($query);


}
else
{

   $stmt = $mysqli->prepare("SELECT * FROM `product_tbl` WHERE `status` = 1 ORDER by RAND()");



}

   $stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();


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
                     <form action="shop.php" method="post">
                        <input type="search" placeholder="Product name..." name="searchparam" required="">
                        <input type="submit">
                     </form>
                  </div>
							<!-- price range -->
							<div class="range">

    <form method="post" action="shop.php">
      <label for="price-min" id="price-min-label">Price:</label><div data-role="rangeslider" class="ui-rangeslider">

        <input type="number" data-type="range" name="pricemin" id="price-min" value="200" min="0" max="1000" class="ui-shadow-inset ui-corner-all ui-slider-input ui-rangeslider-first ui-body-inherit" required>
        <label for="price-max" id="price-max-label">Price:</label>
        <input type="number" data-type="range" name="pricemax" id="price-max" value="800" min="0" max="1000" class="ui-shadow-inset ui-corner-all ui-slider-input ui-rangeslider-last ui-body-inherit" required>
      <div class="ui-rangeslider-sliders"><div role="application" class="ui-slider-track ui-shadow-inset ui-bar-inherit ui-corner-all" aria-disabled="false" style="z-index: 1;"><div class="ui-slider-bg ui-btn-active" style="width: 80%; margin-left: 0%;"></div></div><div role="application" class="ui-slider-track ui-shadow-inset ui-bar-inherit ui-corner-all" aria-disabled="false"><div class="ui-slider-bg ui-btn-active" style="width: 80%; margin-left: 0%;"></div><a href="#" class="ui-slider-handle ui-btn ui-shadow ui-btn-null" role="slider" aria-valuemin="0" aria-valuemax="1000" aria-valuenow="0" aria-valuetext="0" title="0" aria-labelledby="price-min-label" style="left: 0%;"></a><a href="#" class="ui-slider-handle ui-btn ui-shadow ui-btn-null" role="slider" aria-valuemin="0" aria-valuemax="1000" aria-valuenow="800" aria-valuetext="800" title="800" aria-labelledby="price-max-label" style="left: 80%;"></a></div></div></div>
        <div class="ui-btn ui-input-btn ui-corner-all ui-shadow ui-btn-inline"><input type="submit" data-inline="true" value="Submit"></div>

      </form>

							</div>
							<!-- //price range -->
                  <!--preference -->
                  <form method="post" action="shop.php">
                  <div class="left-side border" style="padding-left:22px">
                     <h3 class="agileits-sear-head">Categories</h3>
                     <ul>
                        <li>
                           <input type="checkbox" name="categ[]" class="checked" value="Chocolates">
                           <span class="span">Chocolates</span>
                        </li>
                        <li>
                           <input type="checkbox" name="categ[]" class="checked"  value="Mugs">
                           <span class="span">Mugs</span>
                        </li>
                        <li>
                           <input type="checkbox" name="categ[]" class="checked"  value="Soft Toys">
                           <span class="span">Soft Toys</span>
                        </li>
                        <li>
                           <input type="checkbox" name="categ[]" class="checked"  value="Cards">
                           <span class="span">Cards</span>
                        </li>
                        <li>
                           <input type="checkbox" name="categ[]" class="checked"  value="Cakes">
                           <span class="span">Cakes</span>
                        </li>
                        <li>
                           <input type="checkbox" name="categ[]" class="checked"  value="Flowers">
                           <span class="span">Flowers</span>
                        </li>
                     </ul>

                     <input type="submit" value="Submit">
                  </div>
                  </form>

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
            <form action="login.php" method="post">
               <div class="fields-grid">
                  <div class="styled-input">
                     <input type="text" placeholder="Username" name="Username" required="">
                  </div>

                  <div class="styled-input">
                     <input type="password" placeholder="Password" name="Password" required="">
                  </div>
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

						$i = 0;
							while ($row = $result->fetch_assoc()) {
                              $i++;
						?>

                  <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                        <div class="product-toys-info">
                           <div class="men-pro-item">
                              <div class="men-thumb-item">
                                 <img src="<?php echo $row["image1"];?>" class="img-thumbnail" alt="">
                                 <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                       <a href="single.php?pid=<?php  echo  $row["id"] ; ?>" class="link-product-add-cart">Quick View</a>
                                    </div>
                                 </div>
                                 <span class="product-new-top">New</span>
                              </div>
                              <div class="item-info-product">
                                 <div class="info-product-price">
                                    <div class="grid_meta">
                                       <div class="product_price">
                                          <h4>
                                             <a href="single.php?pid=<?php  echo  $row["id"] ; ?>"><?php echo $row["pname"] ?></a>
                                          </h4>
                                          <div class="grid-price mt-2">
                                             <span class="money ">Rs.<?php echo $row["pprice"]?></span>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="toys single-item hvr-outline-out">
                                       <form action="AddToCart.php" method="post">
                                          <input type="hidden" name="pname" value="<?php echo $row["pname"]; ?>">
                                          <input type="hidden" name="qty" value="1">
                                          <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
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


                     if($i == 0)
                     {
                     ?>

                        <h1> Oops!! No Results Found !!</h1>

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
