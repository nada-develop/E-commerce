<?php
include("includes/db.php");
include("functions/function.php");
// include("languages/ar.php");
if(isset($_GET['pro_id'])){
$product_id = $_GET['pro_id'];
$get_pro = "SELECT * FROM products WHERE product_id = '$product_id'";
$run_product = mysqli_query($conn,$get_pro);
$row_product = mysqli_fetch_array($run_product);
$p_cat_id = $row_product['p_cat_id'];
$product_title = $row_product['product_title'];
$product_img1 = $row_product['product_img1'];
$product_img2 = $row_product['product_img2'];
$product_img3 = $row_product['product_img3'];
$product_price = $row_product['product_price'];
$product_desc= $row_product['product_desc'];
$get_cat =  "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat_id'";
$cat_product = mysqli_query($conn,$get_cat);
$row_cat = mysqli_fetch_array($cat_product);
$p_cat_title = $row_cat['p_cat_title'];
$p_cat_desc = $row_cat['p_cat_desc'];

}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>
    <!-- <link rel="stylesheet" href="styles/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald&display=swap" rel="stylesheet"
  </head>
  <body>
<div id="top"><!--top begin-->
  <div class="container">
    <div class="col-md-6 offer"><!--col-md-6 offer begin-->
      <a href="#" class="btn btn-success btn-sm">   <?php
         if(!isset($_SESSION['customer_email'])){
           echo "Welcome : Guest";
         }else{
           echo "welcome :" . $_SESSION['customer_email'] . " ";
         }

          ?></a>
      <a href="checkout.php"><?php item() ;?> Items In Your Cart | total price : <?php total_price() ;?></a>
    </div><!--col-md-6 offer end-->
    <div class="col-md-6 "><!--col-md-6  begin-->
      <ul class="menu">
        <li><?php
        if (!isset($_SESSION["customer_email"])) {
              echo "<a href='../checkout.php'>Log in</a>";
            } else{
              echo "<a href='my_account.php?edit_account'>Edit Account</a>";
            }
           ?></li>
        <li><a href="my_account.php">My Account</a></li>
        <li><a href="../cart.php">Go To Cart</a></li>
        <li> <?php
          if(!isset($_SESSION['customer_email'])){
            echo "<a href='../checkout.php'>Log In</a>";
          }else{
            echo "<a href='../logout.php'>Log out</a> ";
          }

           ?></li>
      </ul>
  </div><!--col-md-6  end-->
</div><!--container end -->
</div><!--top end-->
<div id="navbar" class="navbar navbar-default"> <!--navbar navbar-default begin -->
  <div class="container"> <!--container begin -->
    <div class="navbar-header"><!--navbar-header begin -->
<a href="../index.php" class="navbar-brand home"><!--navbar-brand home begin -->
<img src="images/logo.png" alt="store" width="83px" height="33px">
</a><!--navbar-brand home end -->
<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">toggle navigation</span>
<i class="fa fa-align-justify"></i>
</button>
<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
<span class="sr-only">toggle search</span>
<i class="fa fa-search"></i>
</button>
    </div><!--navbar-header end -->
    <div class="navbar-collapse collapse" id="navigation"><!--navbar-collapse collapse begin -->
<div class="padding-nav"><!--padding-nav begin -->
  <ul class="nav navbar-nav left">
    <li><a href="../index.php">Home</a></li>
    <li><a href="../shop.php">Shop</a></li>
    <li class="active"><a href="my_account.php?my_orders">My Account</a></li>
    <li><a href="../cart.php">Shopping Cart</a></li>
    <li><a href="../contact.php">Contact Us</a></li>

  </ul>
</div><!--padding-nav end -->
<a href="../cart.php" class="btn navbar-btn btn-primary right"><!--btn navbar-btn btn-primary right begin -->
<i class="fa fa-shopping-cart"></i>
<span><?php item() ;?>item In Your Cart</span>
</a><!--btn navbar-btn btn-primary right end -->
<div class="navbar-collapse collapse right"><!--navbar-collapse collapse right begin -->
  <button type="button" class="btn btn-primary navbar-btn" data-toggle="collapse" data-target="#search">
    <span class="sr-only">toggle search</span>
    <i class="fa fa-search"></i>
  </button>
</div><!--navbar-collapse collapse right end -->
<div class="collapse clearfix" id="search"><!--collapse clearfix begin --><!--search form-->
  <form class="navbar-form" action="results.php" method="get"><!--navbar-form begin -->
  <div class="input-group"><!--input-group begin -->
<input type="text" class="form-control"name="user_query"placeholder="Search" required>
<span class="input-group-btn"><!--input-group-btn begin -->
<button class="btn btn-primary" type="submit"name="search"value="search"><!--btn btn-primary begin -->
<i class="fa fa-search"></i>
</button><!--btn btn-primary end -->
</span><!--input-group-btn end -->
  </div><!--input-group end -->
</form><!--navbar-form end -->
</div><!--collapse clearfix end --><!--search form-->
    </div><!--navbar-collapse collapse end -->
  </div><!--container end -->
</div> <!--navbar navbar-default end -->
