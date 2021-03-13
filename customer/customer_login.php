<div class="box"><!--box begin-->
  <div class="box-header"><!--box-header begin-->
     <center>
      <h1>Login</h1>
       <p class="lead"> Already Have Our Account...?</p>
       <p class="text-muted">ldofjgkkkkkktgjiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
       hjhgfjhgrhgkjrhgkjrhgjjhgkjhgkjgkjhgkghkjhgkjhkjhbkjrhgkhrgiuoiuiogitoiuhoiuh6
     jttlitjhitjhyhyou</p>
    </center>
  </div><!--box-header finish-->
  <form class="" action="checkout.php" method="post"><!--form begin-->
  <div class="form-group"><!--form-group begin-->
    <label >Email</label>
    <input type="email" name="c_email" class="form-control" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label >Password</label>
    <input type="password" name="c_pass" class="form-control" required>
  </div><!--form-group finish-->
  <div class="text-center"><!--text-center begin-->
    <button class="btn btn-primary" value="login" name="login">
   <i class="fa fa-sign-in"></i> Login
    </button>
  </div><!--text-center finish-->
  <center><!--center begin-->
<a href="customer_register.php">
<h3>Dont have account..? Register Here </h3>
</a>
  </center><!--center finish-->
  </form><!--form finish-->
</div><!--box finish-->
<?php
if(isset($_POST['login'])){
$customer_email = $_POST['c_email'];
$customer_pass = $_POST['c_pass'];
$select_customer = "SELECT * FROM customer WHERE customer_email = '$customer_email'";
$run_customer = mysqli_query($conn,$select_customer);
$check_mail = mysqli_num_rows($run_customer);
// $get_ip = getRealIpUser();
// $select_cart = "SELECT * FROM cart WHERE ip_add = '$get_ip'";
// $run_cart = mysqli_query($conn,$select_cart);
// $check_cart = mysqli_num_rows($run_cart);
if($check_mail==1){
  $select_pass = "SELECT customer_pass FROM customer WHERE customer_email = '$customer_email'";
  $run_pass = mysqli_query($conn,$select_pass);
  $password_rec = mysqli_fetch_assoc($run_pass);
  $password = $password_rec['customer_pass'];
  if(password_verify($customer_pass, $password)){
    $_SESSION['customer_email'] = $customer_email;
    echo "<script>alert('Your are logged in')</script>";
    echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
  }else{
    echo "<script>alert('Your email or password is wrong')</script>";
      exit();
  }
}else{
  echo "<script>alert('Your email or password is wrong')</script>";
    exit();
}
// $get_ip = getRealIpUser();
// $select_cart = "SELECT * FROM cart WHERE ip_add = '$get_ip'";
// $run_cart = mysqli_query($conn,$select_cart);
// $check_cart = mysqli_num_rows($run_cart);
//
// if($check_customer==1 AND $check_cart==0){
//
// $_SESSION['customer_email'] = $customer_email;
// echo "<script>alert('Your are logged in')</script>";
// echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
// }else{
//   $_SESSION['customer_email'] = $customer_email;
//   echo "<script>alert('Your are logged in')</script>";
//   echo "<script>window.open('checkout.php','_self')</script>";
//
// }
}
 ?>
