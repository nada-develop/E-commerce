<?php
$conn = mysqli_connect("localhost","root","","bazzar_store");
function getpro(){
GLOBAL $conn;
$get_products = "SELECT * FROM products order by 1 DESC LIMIT 0,8";
$run_products = mysqli_query($conn,$get_products);
 return $run_products;
}
//BEGIN  function to get real ip user
function getRealIpUser(){
  switch(true){
  case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
  case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
  case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default : return $_SERVER['REMOTE_ADDR'];
  }
}
//finish real ip function
//begin add_cart function
function add_cart($p_id,$product_qty,$product_size){
  GLOBAL $conn;
// if(isset($_GET['add_cart'])){
  $ip_add = getRealIpUser();
  // $p_id = $_GET['add_cart'];
  // $product_qty = $_POST['product_qty'];
  // $product_size = $_POST['product_size'];
  $check_product = "SELECT * FROM cart WHERE ip_add = '$ip_add'AND p_id = '$p_id'";
  $run_check = mysqli_query($conn,$check_product);
  if(mysqli_num_rows($run_check)>0){
    echo "<script> alert('This product Has Already Added in cart') </script>";
    echo "<script> window.open('details.php?pro_id=$p_id','_self') </script>";
  }else{
    $query = "INSERT INTO cart (p_id,ip_add,qty,size) VALUES ('$p_id','$ip_add','$product_qty','$product_size')";
    $run_query = mysqli_query($conn,$query);
    echo "<script> window.open('details.php?pro_id=$p_id','_self') </script>";
    // header("Location: details.php?pro_id=$p_id");

  }
}
// }
//finish add_cart function
//دي الدالة اللي يتظهر اقسام المنتجات نفسه يعني جواكت احذية
function getpcats(){
GLOBAL $conn;
$get_p_cats = "SELECT * FROM product_categories";
$run_p_cats = mysqli_query($conn,$get_p_cats);
while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
  $p_cat_id = $row_p_cats["p_cat_id"];
  $p_cat_title = $row_p_cats['p_cat_title'];
  echo "
<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>

  ";

}
}
//دي الدالة اللي بتظهر الاقسام في العموم يعني اطفال ولا رجال
function getcats(){
GLOBAL $conn;
$get_cats = "SELECT * FROM categories";
$run_cats = mysqli_query($conn,$get_cats);
while ($row_cats = mysqli_fetch_array($run_cats)) {
  $cat_id = $row_cats["cat_id"];
  $cat_title = $row_cats['cat_title'];
  echo "
  <li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>

";
}
}


//begin getcatpro function
function getpcatpro(){
GLOBAL $conn;
if(isset($_GET['p_cat'])){
$p_cat_id = $_GET['p_cat'];
$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id ='$p_cat_id'";
$run_p_cat = mysqli_query($conn,$get_p_cat);
$row_p_cat = mysqli_fetch_array($run_p_cat);
$p_cat_title = $row_p_cat['p_cat_title'];
$p_cat_desc = $row_p_cat['p_cat_desc'];
$get_products = "SELECT * FROM products WHERE p_cat_id = '$p_cat_id'";
$run_products = mysqli_query($conn,$get_products);
$count = mysqli_num_rows($run_products);
if($count==0){
  echo "
<div class='box'>
<h1>No Product Found In This Category</h1>
</div>
  ";
}else{
  echo "
  <div class='box'>
  <h1>$p_cat_title</h1>
  <p>$p_cat_desc</p>
  </div>
  ";
}
while ($row_products=mysqli_fetch_array($run_products)) {
$pro_id =  $row_products['product_id'];
$pro_img1 = $row_products['product_img1'];
$pro_title = $row_products['product_title'];
$pro_price = $row_products['product_price'];
echo "
<div class='col-md-4 col-sm-6  center-responsive'>
  <div class='product'>
    <a href='details.php?pro_id=$pro_id'>
     <img  class='img-responsive' src='admin-area/product-image/$pro_img1' style='width:1100px;height:270px;'>
    </a>
    <div class='text'>
      <h3>
         <a href='details.php?pro_id=$pro_id'>$pro_title</a>
      </h3>
      <p class='price'>$pro_price</p>
      <p class='button'>
   <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
   <a href='details.php?pro_id=<?$pro_id' class='btn btn-primary'>
    <i class='fa fa-shopping-cart'>
    Add To Cart</i>
    </a>
      </p>
    </div>
  </div>
</div>
";
}

}


}
//begin get_cat function
function get_cat(){
  GLOBAL $conn;
if(isset($_GET['cat'])){
$cat_id = $_GET['cat'];
$cat_pro = "SELECT * FROM categories WHERE cat_id = '$cat_id' ";
$run_cat = mysqli_query($conn,$cat_pro);
$row_cat = mysqli_fetch_array($run_cat);
$cat_title = $row_cat['cat_title'];
$cat_desc = $row_cat['cat_desc'];
$pro_cat = "SELECT * FROM products WHERE cat_id = '$cat_id' LIMIT 0,6 ";
$run_procat = mysqli_query($conn,$pro_cat);
$count = mysqli_num_rows($run_procat);
if($count==0){
  echo "
<div class='box'>
<h1>No category Found In This Category</h1>
</div>
  ";
}else{
  echo "
  <div class='box'>
  <h1>$cat_title</h1>
  <p>$cat_desc</p>
  </div>

  ";
}
while ($row_procats=mysqli_fetch_array($run_procat)) {
$pro_id =  $row_procats['product_id'];
$pro_img1 = $row_procats['product_img1'];
$pro_title = $row_procats['product_title'];
$pro_price = $row_procats['product_price'];
echo "
<div class='col-md-4 col-sm-6  center-responsive'>
  <div class='product'>
    <a href='details.php?pro_id=$pro_id'>
     <img  class='img-responsive' src='admin-area/product-image/$pro_img1' style='width:1100px;height:270px;'>
    </a>
    <div class='text'>
      <h3>
         <a href='details.php?pro_id=$pro_id'>$pro_title</a>
      </h3>
      <p class='price'>$pro_price</p>
      <p class='button'>
   <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
   <a href='details.php?pro_id=<?$pro_id' class='btn btn-primary'>
    <i class='fa fa-shopping-cart'>
    Add To Cart</i>
    </a>
      </p>
    </div>
  </div>
</div>
";
}

}
}
//BEGIN  function to get real ip user
//BEGIN  function to get no of items in the cart of user
function item(){
  GLOBAL $conn;
  $ip_add = getRealIpUser();
$get_item = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
$run_item = mysqli_query($conn,$get_item);
$count = mysqli_num_rows($run_item);
  // return $count;دي بتخزن متغير phpمش بتطبع
  echo $count;
}
//finish  function to get no of items in the cart of user
//BEGIN  function to get real ip user
//BEGIN  function to get total price of user
function total_price(){
  GLOBAL $conn;
  $ip_add = getRealIpUser();
  $total = 0;
  $get_id_pro = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
  $run_get_id_pro = mysqli_query($conn,$get_id_pro);
  while ($row_cart = mysqli_fetch_array($run_get_id_pro)) {
    $pro_id = $row_cart['p_id'];
    $pro_qty = $row_cart['qty'];
    $get_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
    $run_price = mysqli_query($conn,$get_price);
    while ($price_pro = mysqli_fetch_array($run_price)) {
      $subtotal = $price_pro['product_price']*$pro_qty;
      $total += $subtotal;
    }
}
echo "$" . $total;
}
//finish  function to get total price of user
//begin function to delete product id
function   deleteproduct($p_id){
    GLOBAL $conn;
    $q = "DELETE FROM cart WHERE p_id = '$p_id'";
    $result = mysqli_query($conn, $q);
}


//finish function to delete product id



 ?>
