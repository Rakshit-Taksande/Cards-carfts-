<?php require("conn.php"); ?>
<div class="header-bar">
            <div class="info-top-grid">
               <div class="info-contact-agile">
                  <ul>
                     <li>
                        <span class="fas fa-phone-volume"></span>
                        <p>+91-897036841</p>
                     </li>
                     <li>
                        <span class="fas fa-envelope"></span>
                        <p><a href="mailto:cards&crafts@gmail.com">cards&crafts@gmail.com</a></p>
                     </li>
                     <li>
                     </li>
                  </ul>
               </div>
            </div>
            
            <div class="container-fluid">
               <div class="hedder-up row">
                  <div class="col-lg-3 col-md-3 logo-head">
                     <h1><a class="navbar-brand" href="index.php">Cards & Crafts</a></h1>
                  </div>
                  <div class="col-lg-5 col-md-6 search-right">
                     <form method="post" action="shop.php" class="form-inline my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="searchparam" placeholder="Search">
                        <button class="btn" type="submit">Search</button>
                     </form>
                  </div>

                  <div class="col-lg-4 col-md-3 right-side-cart">
                     <div class="cart-icons">
                        <ul>
                           <li>
                           <?php if(isset($_SESSION["auth"] ) && $_SESSION["auth"]!=""){
                             
                             if($_SESSION["auth"]==2)
                             { ?>


<a href="logout.php" class="top_toys_cart" type="submit" name="submit" value="">
                                 <span class="fas fa-sign-out-alt"></span>
                                 </a>

                             <?php }
                             
                             if( $_SESSION["auth"]!=1)
                              {

                              ?>


                           <?php } else {
                              echo "Welcome ".$_SESSION["username"];
                           ?>
                              <a href="logout.php" class="top_toys_cart" type="submit" name="submit" value="">
                                 <span class="fas fa-sign-out-alt"></span>
                                 </a>
                           <?php
                           }} else {
                              ?>
                              <button type="button" data-toggle="modal" data-target="#exampleModal"> <span class="far fa-user"></span></button>

                              <?php
                           }
                              ?>
                           </li>
                           <a href="cart.php" class="top_toys_cart" type="submit" name="submit" value="">
                                 <span class="fas fa-cart-arrow-down" style="color:red;"></span>
                                 </a>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                     </li>
                   
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php

						$stmt = $mysqli->prepare("SELECT * FROM `category`");
						$stmt->execute();
						$result = $stmt->get_result();
						$stmt->close();
							while ($row = $result->fetch_assoc()) {

						?>

                           <a class="nav-link" href="shop.php?cat=<?php echo $row["category"]?>"><?php echo $row["category"]?></a>
                <?php 

                     }

                     ?>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
