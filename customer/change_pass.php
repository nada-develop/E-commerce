<h1 align="center"> Change Account</h1>

<form class="" action="" method="post" enctype="multipart/form-data"><!--form begin-->
  <div class="form-group"><!--form-group begin-->
    <label>Your Old Password:</label>
    <input type="password" name="old_pass" class="form-control" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Your New Password:</label>
    <input type="password" name="new_pass" class="form-control" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Confirm Your New Password:</label>
    <input type="password" name="new_pass_again" class="form-control" required>
  </div><!--form-group finish-->
  <div class="text-center">
    <button type="submit" name="submit" class="btn btn-primary">
  <i class="fa fa-user-md"></i> Update Now
    </button>
  </div>
</form><!--form finish-->
<?php
if(isset($_POST['submit'])){
$c_email = $_SESSION['customer_email'];
$c_old_pass = $_POST['old_pass'];
$c_new_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
$c_new_pass_again = password_hash($_POST['new_pass_again'], PASSWORD_DEFAULT);
$select_pass = "SELECT customer_pass FROM customer WHERE customer_email='$c_email'";
$run_select_pass = mysqli_query($conn,$select_pass);
$row_select_pass = mysqli_fetch_assoc($run_select_pass);
$password = $row_select_pass['customer_pass'];
if(password_verify($c_old_pass, $password)) {
if($c_new_pass = $c_new_pass_again){
$update_pass = "UPDATE customer SET customer_pass='$c_new_pass' WHERE customer_email='$c_email'";
$run_update_pass = mysqli_query($conn,$update_pass);
echo "<script>alert('Your Password has been updated')</script>";
echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}else{
  echo "<script>alert('Sorry Your New Password did not match')</script>";
}
}else {
  echo "<script>alert('Sorry Your New Password did not match')</script>";

}
}
 ?>
