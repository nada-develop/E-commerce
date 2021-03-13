<center>
<h1>My Orders</h1>
<p class="lead"> Your Orders on One Place</p>
<p class="text-muted">
IF You Have any questions, Feel Free To <a href="../contact.php">Contact Us</a> . Our Customer services Work <strong> 24/7 </strong>
</p>
</center>
<hr>
<div class="table-responsive"><!--table-responsive begin-->
<table class="table table-bordered  table-hover"><!--table table-bordered  table-hover begin-->
<thead>
  <tr>
    <th>ON:</th>
    <th>Due Amount:</th>
    <th>Invoice No:</th>
    <th>Qty :</th>
    <th>Size</th>
    <th>Order Date :</th>
    <th>Paid / UnPaid :</th>
    <th>Status:</th>
  </tr>
<?php
$customer_session = $_SESSION["customer_email"];
$get_customer = "SELECT * FROM customer WHERE customer_email = '$customer_session'";
$run_customer = mysqli_query($conn,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
$get_order = "SELECT * FROM customer_orders WHERE customer_id = '$customer_id'";
$run_order = mysqli_query($conn,$get_order);
$i = 0;
while ($row_order = mysqli_fetch_array($run_order)) {
  $order_status = $row_order['order_status'];
$i++;
$order_date = substr($row_order['order_date'],0,11);
if($order_status=="pending"){
  $order_status="Unpaid";
}else{
    $order_status="Paid";
}
  ?>
<tbody>
    <tr>
      <th><?php echo $i; ?></th>
      <td><?php echo $row_order['due_amount']; ?></td>
      <td><?php echo $row_order['invoice_no']; ?></td>
      <td><?php echo $row_order['qty']; ?></td>
      <td><?php echo $row_order['size']; ?></td>
      <td><?php echo $order_date; ?></td>
      <td><?php echo $order_status; ?></td>
      <td><a href="confirm.php?order_id=<?php echo $row_order['order_id']; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid</a>
      </td>
    </tr>
  </tbody>
<?php } ?>
</thead>
</table><!--table table-bordered  table-hover finish-->
</div><!--table-responsive finish-->
