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

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="register-form">
               <form action="registration.php" id="registerform" method="post">
                  <div class="fields-grid">

                  <div class="styled-input">
                        <input type="email" placeholder="Email" name="Email" required="">
                     </div>

                     <div class="styled-input">
                        <input type="password" id="pwd" placeholder="Password" name="Password" required="">
                     </div>

                     <div class="styled-input">
                        <input type="password" id="cpwd" placeholder="ConfirmPassword" name="ConfirmPassword" required="">
                     </div>
                     <?php

              if(isset($_SESSION["msg"]) && $_SESSION["msg"] != "")
              {

                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> '.$_SESSION["msg"].'</div>';


              }

?>
                     <button type="button" class="btn subscrib-btnn" onclick="func()">Register</button>
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

<script>
        function func() {
            var pd = document.getElementById("pwd").value;
            var cpd = document.getElementById("cpwd").value;
            if (pd != cpd) {
                alert("Password doesn't match");
            }
            else
            {

               document.getElementById("registerform").submit();

            }
        }
    </script>

      <script>
$(document).ready(function() {

   <?php
         if(isset($_SESSION["msg"]) && $_SESSION["msg"] != "")
                    { ?>

$("#exampleModal").modal("show");

<?php
  $_SESSION["msg"]="";                  }
?>

});


</script>
