<?php
$active ='Account';
include("includes/header.php");

 ?>
<div id="content"><!--#content begin -->
<div class="container"><!--container begin -->
  <div class="col-md-12"><!--col-md-12 begin -->
    <ul class="breadcrumb"><!--breadcrumb begin -->
      <li>
<a href="index.php">Home</a>
      </li>
      <li>Register</li>
    </ul><!--breadcrumb finish -->
  </div><!--col-md-12finish -->
  <div class="col-md-3"><!--col-md-3 begin -->

<?php
include("includes/sidebar.php");
 ?>
  </div><!--col-md-3 finish -->
  <div class="col-md-9"><!--col-md-9 begin -->

  <?php
  if(!isset($_SESSION["customer_email"])){
    include("customer/customer_login.php");
  }else{
    include("payment_options.php");
  }

   ?>
 </div><!--col-md-9 finish -->

</div><!--container finish -->
</div><!--#content finish -->

<?php include("includes/footer.php") ?>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  <!-- <script src="js/fontawesome.min.js"></script> -->
  </body>
</html>
