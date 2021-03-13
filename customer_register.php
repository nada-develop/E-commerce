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
    <div class="box register"><!--box begin -->
      <div class="box-header"><!--box-header begin -->
        <center>
          <h2> Register a New Account </h2>
        </center>
        <form action="customer_register.php" method="post" enctype="multipart/form-data"><!--form begin-->
          <div class="form-group"><!--form-grioup begin-->
          <label> Your Name</label>
          <input type="text" class="form-control" name="c_name" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label> Your Email</label>
          <input type="email" class="form-control" name="c_email" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Your password</label>
          <input type="password" class="form-control" name="c_pass" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Your Country</label>
          <input type="text" class="form-control" name="c_country" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Your City</label>
          <input type="text" class="form-control" name="c_city" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Your Contact</label>
          <input type="text" class="form-control" name="c_contact" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Your Address</label>
          <input type="text" class="form-control" name="c_address" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Your Profile Picture</label>
          <input type="file" class="form-control" name="c_image" required >
          </div><!--form-grioup finish-->
          <div class="text-center"><!--text-center begin-->
           <button type="submit" name="register" class="btn btn-primary">
           <i class="fa fa-user-md"></i> Register
           </button>
          </div>
        </form><!--form finish-->
      </div><!--box-header finish -->
    </div><!--box finish -->
  </div><!--col-md-9 finish -->










</div><!--container finish -->
</div><!--#content finish -->

<?php include("includes/footer.php") ?>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  <!-- <script src="js/fontawesome.min.js"></script> -->
  </body>
</html>
<?php
if(isset($_POST['register'])){
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $enc_password = password_hash($_POST["c_pass"], PASSWORD_DEFAULT);
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_ip = getRealIpUser();
  // $folder ="customer/customer_images/";
move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
$insert_customer = "INSERT INTO customer (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_address,customer_contact,customer_image,customer_ip)
VALUES ('$c_name','$c_email','$enc_password','$c_country','$c_city','$c_address','$c_contact','$c_image','$c_ip')";
$run_customer = mysqli_query($conn,$insert_customer);
$sel_cart = "SELECT * FROM cart WHERE ip_add = '$c_ip'";
$run_sel_cart = mysqli_query($conn,$sel_cart);
$check_cart = mysqli_num_rows($run_sel_cart);
if($check_cart>0){
    $_SESSION["customer_email"] = $_POST['c_email'];
  echo "<script>alert('you have been registered successfully')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
//if register without item in cart//
}else{
  $_SESSION["customer_email"] = $_POST['c_email'];
  echo "<script>alert('you have been registered successfully')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}

}






 ?>
