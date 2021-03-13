<?php
$active='Cart';
include("includes/header.php");
if(isset($_GET['p_id'])){
    $p_id = $_GET['p_id'];
  deleteproduct($p_id);
}
 ?>
<div id="content"><!--#content begin -->
<div class="container"><!--container begin -->
  <div class="col-md-12"><!--col-md-12 begin -->
    <ul class="breadcrumb"><!--breadcrumb begin -->
      <li>
<a href="index.php">Home</a>
      </li>
      <li>Cart</li>
    </ul><!--breadcrumb finish -->
  </div><!--col-md-12finish -->
  <div class="col-md-9" id="cart"><!--col-md-9 begin -->
    <div class="box"><!--box begin -->
    <form action="cart.php" method="post" enctype="multipart/form-data"><!--form begin-->
      <h1> Shopping Cart</h1>
      <?php
      $ip_add = getRealIpUser();
    $get_item = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
    $run_item = mysqli_query($conn,$get_item);
    $count = mysqli_num_rows($run_item);
       ?>
      <p class="text-muted">You Currently have <?php echo $count; ?> item(s) in your cart</p>
      <div class="table-responsive"><!--table-responsive begin -->
        <table class="table"><!--table begin -->
          <thead><!--thead begin -->
            <tr>
              <th colspan="2">Product</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Size</th>
              <th colspan="1">Delete</th>
              <th colspan="2">Sub-Total</th>
            </tr>
          </thead><!--thead finish -->
          <tbody><!--tbody begin -->

            <?php
            $total = 0;
           while ($row_cart=mysqli_fetch_array($run_item)) {
             $pro_id = $row_cart['p_id'];
             $get_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
             $run_price = mysqli_query($conn,$get_price);
               while ($get_detail_pro = mysqli_fetch_array($run_price)) {
               $subtotal = $row_cart['qty']*$get_detail_pro['product_price'];
               $total+=$subtotal;
             ?>
            <tr>
            <td><img class="img-responsive" src="admin-area/product-image/<?php echo $get_detail_pro['product_img1']; ?>"></td>
            <td><a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $get_detail_pro['product_title']; ?></a></td>
            <td> <?php echo $row_cart['qty']; ?> </td>
            <td> <?php echo $get_detail_pro['product_price']; ?>  </td>
            <td> <?php echo $row_cart['size']; ?> </td>
            <td><a href="cart.php?p_id=<?php echo $get_detail_pro['product_id']; ?>"><i class="fa fa-trash"></i></a></td>
            <!-- <td> <input type="checkbox" name="remove" value=""> </td> -->
            <td> <?php echo $subtotal; ?> </td>
            </tr>
          <?php } } ?>

        </tbody><!--tbody finish -->

          <tfoot><!--tfoot begin -->
            <tr>
              <th colspan="5">total</th>
              <th colspan="2"><?php echo $total; ?></th>
            </tr>
          </tfoot><!--tfoot finish -->
        </table><!--table finish -->
      </div><!--table-responsive finish -->
     <div class="box-footer"><!--box-footer begin -->
       <div class="pull-left"><!--pull-left begin -->
         <a  href="index.php" class="btn btn-default">
           <i class="fa fa-chevron-left"></i> Continue Shopping
         </a>
       </div><!--pull-left finish -->
         <div class="pull-right"><!--pull-right begin -->
         <button type="submit" name="update" value="update cart" class="btn btn-default">
           <i class="fa fa-refresh"></i> Update Cart
         </button>
         <a href="checkout.php" class="btn btn-primary"> Proceed checkout <i class="fa fa-chevron-right"></i> </a>
       </div><!--pull-right finish -->
     </div><!--box-footer finish -->
   </form><!--form finish-->
    </div><!--box finish -->
    <?php
    // function update_cart(){
    //   GLOBAL $conn;
    //   if(isset($_POST['update'])){
    //     foreach($_POST['remove'] as $remove_id){
    //       $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id'";
    //       $run_delete = mysqli_query($conn,$delete_product);
    //       if($run_delete){
    //    echo "<script>window.open('cart.php','_self')</script>";
    //       }
    //
    //
    //     }
    //   }
    //
    // }
    //   echo @$up_cart = update_cart();
     ?>

    <div id="row same-height-row"><!-- #row same-height-row begin -->
    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 begin -->
    <div class="box same-height-headline"><!--box same-height-headline begin -->
    <h3>Products You May Be Like</h3>
    </div><!--box same-height-headline finish -->
    </div><!--col-md-3 col-sm-6 finish -->
    <?php
    $get_products = "SELECT * FROM products ORDER BY rand() LIMIT 0,3";
    $run_product = mysqli_query($conn,$get_products);
    while ($row_product = mysqli_fetch_array($run_product)) {?>
    <div class="col-md-3 col-sm-6 center-responsive"><!--col-md-3 col-sm-6 center-responsive begin -->
    <div class="product same-height"><!--product same-height begin -->
    <a href="details.php?pro_id=<?php echo $row_product['product_id']?>">
      <img src="admin-area/product-image/<?php echo $row_product['product_img1']?>" class="img-responsive">
    </a>
    <div class="text">
      <h3><a href="details.php?pro_id=<?php echo $row_product['product_id']?>"> <?php echo $row_product['product_desc']?></a></h3>
      <p class="price"><?php echo $row_product['product_price']?></p>
    </div>
    </div><!--product same-height finish -->
    </div><!--col-md-3 col-sm-6 center-responsive finish -->
  <?php } ?>
</div><!-- #row same-height-row finish -->

  </div><!--col-md-9 finish -->
<div class="col-md-3"><!--col-md-3 begin-->
  <div class="box" id="order-summary"><!--#order-summary begin-->
<div class="box-header"><!--box-header begin-->
  <h3>Order Summary</h3>
</div><!--box-header finish-->
<p class="text-muted">
  Shipping and additional costs are calculated based on value you have entered
</p>
<div class="table-responsive"><!--table-responsive finish-->
  <table class="table"><!--table begin-->
<tbody>
  <tr><!--tr begin-->
    <td> Order All Sub-Total </td>
    <td> <?php echo $total; ?> </td>
  </tr><!--tr finish-->
  <tr><!--tr begin-->
    <td>Shipping And Handling</td>
    <td> $0 </td>
  </tr><!--tr finish-->
  <tr><!--tr begin-->
    <td> tax </td>
    <td> $0 </td>
  </tr><!--tr finish-->
  <tr class="total"><!--tr begin-->
    <td> Total</td>
    <td> <?php echo $total; ?> </td>
  </tr><!--tr finish-->
</tbody>
  </table><!--table finish-->
</div><!--table-responsive finish-->
  </div><!--#order-summary begin-->
</div><!--col-md-3 finish-->

</div><!--container finish -->
</div><!--#content finish -->

<?php include("includes/footer.php") ?>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  <!-- <script src="js/fontawesome.min.js"></script> -->
  </body>
</html>
