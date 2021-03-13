<?php
$customer_email = $_SESSION["customer_email"];
$get_customer = "SELECT * FROM customer WHERE customer_email='$customer_email'";
$run_customer = mysqli_query($conn,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];

 ?>
<h1 align="center"> Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data"><!--form begin-->
  <div class="form-group"><!--form-group begin-->
    <label>Customer Name:</label>
    <input type="text" name="c_name" class="form-control" value="<?php echo $row_customer['customer_name'] ; ?>" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Email:</label>
    <input type="email" name="c_email" class="form-control" value="<?php echo $row_customer['customer_email'] ; ?>" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Customer Country:</label>
    <input type="text" name="c_country" class="form-control"value="<?php echo $row_customer['customer_country'] ; ?>" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Customer City:</label>
    <input type="text" name="c_city" class="form-control" value="<?php echo $row_customer['customer_city'] ; ?>" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Customer Contact:</label>
    <input type="text" name="c_contact" class="form-control"value="<?php echo $row_customer['customer_contact'] ; ?>" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Customer c_address:</label>
    <input type="text" name="c_address" class="form-control" value="<?php echo $row_customer['customer_address'] ; ?>" required>
  </div><!--form-group finish-->
  <div class="form-group"><!--form-group begin-->
    <label>Customer Image:</label>
    <input type="file" name="c_image" class="form-control" >
    <img  class="img-responsive" src="customer_images/<?php echo $row_customer['customer_image'] ; ?>"  width="224px" height="200px" alt="customer-image">
  </div><!--form-group finish-->
  <div class="text-center">
    <button type="submit" name="update" class="btn btn-primary">
  <i class="fa fa-user-md"></i> Update Now
    </button>
  </div>
</form><!--form finish-->
<?php
if(isset($_POST['update'])){
$update_id = $customer_id;
$f_image = $_FILES['c_image']['name'];
$tmp_image = $_FILES['c_image']['tmp_name'];
move_uploaded_file($tmp_image,"customer_images/$f_image");
$customer_name = $_POST['c_name'];
$customer_email = $_POST['c_email'];
$customer_country = $_POST['c_country'];
$customer_city = $_POST['c_city'];
$customer_address = $_POST['c_address'];
$customer_contact = $_POST['c_contact'];
$update_customer = "UPDATE customer SET customer_name='$customer_name',customer_email='$customer_email',customer_country='$customer_country',customer_city='$customer_city',customer_address='$customer_address',customer_contact='$customer_contact',customer_image='$f_image'
WHERE customer_id = '$update_id'";
$run_update = mysqli_query($conn,$update_customer);
if($run_update){
  echo "<script>alert('Your Account has ben edited, To complete the process,Please Relogin')</script>";
  echo "<script>window.open('../logout.php','_self')</script>";
}

}



 ?>
