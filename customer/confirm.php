<?php
include("includes/header.php");
if($_GET['order_id']){
  $order_id = $_GET['order_id'];
}
?>


<div id="content"><!--#content begin -->
<div class="container"><!--container begin -->
  <div class="col-md-12"><!--col-md-12 begin -->
    <ul class="breadcrumb"><!--breadcrumb begin -->
      <li>
<a href="index.php">Home</a>
      </li>
      <li>shop</li>
    </ul><!--breadcrumb finish -->
  </div><!--col-md-12finish -->
  <div class="col-md-3"><!--col-md-3 begin -->
<?php
include("includes/sidebar.php");
 ?>
</div><!--col-md-3 finish -->
<div class="col-md-9"><!--col-md-9 begin -->
  <div class="box"><!--box begin -->
    <h1 align="center"> Please Confirm Your Payment</h1>
    <form  action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!--form begin -->
      <div class="form-group"><!--form-group begin-->
     <label> Invoice No:</label>
     <input type="text"  class=" form-control" name="Invoice_no" required>
   </div><!--form-group finish-->
   <div class="form-group"><!--form-group begin-->
  <label> Amount Sent</label>
  <input type="text" class="form-control" name="amount_sent" required>
</div><!--form-group finish-->
<div class="form-group"><!--form-group begin-->
<label> Select Payment Mode </label>
<select class="form-control" name="Payment_Mode">
  <option>Select Payment mode</option>
  <option>Back Code</option>
  <option>Url/Omni paise</option>
  <option>Easy Paisa</option>
  <option>Western union</option>
</select>
</div><!--form-group finish-->
<div class="form-group"><!--form-group begin-->
<label> Transaction/Refrence ID: </label>
<input type="text" class="form-control" name="ref_no" required>
</div><!--form-group finish-->
<div class="form-group"><!--form-group begin-->
<label> omni paisa/easy paisa: </label>
<input type="text" class="form-control" name="code" required>
</div><!--form-group finish-->

<div class="form-group"><!--form-group begin-->
<label> Payment Date: </label>
<input type="text" class="form-control" name="date" required>
</div><!--form-group finish-->
<div class="text-center">
  <button class="btn btn-primary btn-lg" name="confirm_payment">
   <i class="fa fa-user-md"></i> Confirm Payment
  </button>
</div>
    </form><!--form finish -->
    <?php
if(isset($_POST['confirm_payment'])){
  $update_id = $_GET['order_id'];
  $invoice_no = $_POST['Invoice_no'];
  $amount_sent = $_POST['amount_sent'];
  $Payment_Mode = $_POST['Payment_Mode'];
  $ref_no = $_POST['ref_no'];
  $code = $_POST['code'];
 $date = $_POST['date'];
 $complete = "complete";
$insert_payment = "INSERT INTO payments (invoice_no,amount,payment_mode,	ref_no,code,payment_date)
VALUES('$invoice_no ','$amount_sent','$Payment_Mode','$ref_no','$code','$date')";
$run_payment = mysqli_query($conn,$insert_payment);
$update_customer_order = "UPDATE customer_orders SET order_status ='$complete' WHERE order_id='$update_id' ";
$run_customer_order = mysqli_query($conn,$update_customer_order );
$update_pending_order = "UPDATE pending_orders SET order_status ='$complete' WHERE order_id='$update_id' ";
$run_pending_order = mysqli_query($conn,$update_pending_order );
if($run_pending_order)
{
  echo "<script>alert('thank you for purchasing,Your orders will be completed within 24 hours work')</script>";
  echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}
}

     ?>
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
