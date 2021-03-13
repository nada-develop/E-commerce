<div class="box"><!--box begin-->
  <?php
    $session_mail = $_SESSION["customer_email"];
    $select_customer = "SELECT * FROM customer WHERE customer_email='$session_mail'";
     $run_customer = mysqli_query($conn,$select_customer);
     $row_customer = mysqli_fetch_array($run_customer);
     $customer_id = $row_customer['customer_id'];
   ?>
  <h1 class="text-center"> Payment Options For You</h1>
  <p class="lead text-center">
  <a href="order.php?c_id=<?php echo $customer_id; ?>"> Offline Payment</a>
</p>
<center><!--center begin-->
<p class="lead">
<a href="#">PayPall Payment
<img src="images/paypall.png" class="img-responsive" alt="">
</a>
</p>

</center><!--center finish-->
</div><!--box finish-->
