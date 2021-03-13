<center>
<h1>Do You Really Want To Delete Your Account ?</h1>
<form action="" method="post"><!--form begin-->
  <input type="submit" name="yes" value="Yes,I Want To Delete" class="btn btn-danger">
  <input type="submit" name="no" value="No,I dont Want To Delete" class="btn btn-primary">
</form><!--form finish-->
</center>
<?php
$c_email = $_SESSION['customer_email'];
if(isset($_POST['yes'])){
$delete_customer = "DELETE FROM customer WHERE customer_email='$c_email'";
$run_delete_customer = mysqli_query($conn,$delete_customer);
if($run_delete_customer){
session_destroy();
echo "<script>alert('successfully delete ypur account, feel sorry about this. Good Bye ')</script>";
echo "<script>window.open('../index.php','_self')</script>";

}

}
if(isset($_POST['no'])){
  echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}

 ?>
