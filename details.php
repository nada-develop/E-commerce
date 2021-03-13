<?php
include("includes/header.php");
if(isset($_GET['add_cart'])){
add_cart($_GET['add_cart'],$_POST['product_qty'],$_POST['product_size']);
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
      <li>
       <a href = "shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title ; ?></a>
      </li>
      <li><?php echo $product_title; ?></li>
    </ul><!--breadcrumb finish -->
  </div><!--col-md-12finish -->
  <div class="col-md-3"><!--col-md-3 begin -->
<?php
include("includes/sidebar.php");
 ?>
</div><!--col-md-3 finish -->
<div class="col-md-9"><!--col-md-9 begin -->
<div class="row" id="productmain"><!--row #productmain begin -->
<div class="col-sm-6"><!--col-sm-6 begin -->
  <div id="mainimage"><!--#mainimage begin -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel"><!--carousel slide begin -->
    <ol class="carousel-indicators"><!--carousel-indicators begin -->
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol><!--carousel-indicators finish -->
    <div class="carousel-inner"><!--carousel-inner begin -->
      <div class="item active">
      <center>  <img src="admin-area/product-image/<?php echo $product_img1; ?>" class="img-responsive" > </center>
      </div>
      <div class="item">
  <center>  <img src="admin-area/product-image/<?php echo $product_img2; ?>" class="img-responsive" > </center>
      </div>
      <div class="item">
  <center>  <img src="admin-area/product-image/<?php echo $product_img3; ?>" class="img-responsive" > </center>
      </div>
    </div><!--carousel-inner finish -->
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><!--carousel slide finish -->
  </div><!--#mainimage finish -->

</div><!--col-sm-6 finish -->
<div class="col-sm-6"><!--col-sm-6 begin -->
  <div class="box"><!--box begin -->
    <h1 class="text-center"><?php echo $product_title; ?></h1>
    <form class="form-horizontal" action="details.php?add_cart=<?php echo $product_id; ?>" method="post"><!--form-horizontal begin -->
      <div class="form-group"><!--form-group begin -->
        <label for="" class="col-md-5 control-label">Products Quantity</label><!--label col-md-5 begin&finish -->
      <div class="col-md-7"><!-- col-md-7 begin -->
        <select class="form-control" name="product_qty" id="">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div><!-- col-md-7 finish -->
    </div><!--form-group finish -->


    <div class="form-group"><!--form2-group begin -->
      <label class="col-md-5 control-label"> Product Size<!-- label2 col-md-5 control-label begin -->
      </label><!-- label2 col-md-5 control-label finish -->
      <div class="col-md-7"><!-- col-md-7 begin -->
      <select class="form-control" name="product_size" required>
        <option disabled selected>Select a Size</option>
        <option>sm</option>
        <option>medium</option>
        <option>large</option>
        <option>X large</option>
      </select>
    </div><!-- col-md-7 finish -->
    </div><!--form2-group finish -->

    <p class="price"><?php echo $product_price; ?></p>
    <p class="text-center buttons"><button type="submit" class="btn btn-primary i fa fa-shopping-cart">Add To Cart</button></p>
    </form><!--form-horizontal finish -->
</div><!--box finish-->
<div class="row" id="thumbs"><!--#thumbs begin -->
  <div class="col-xs-4"><!--col-xs-4 begin -->
    <a  data-target="#myCarousel" data-slide-to="0"href="#" class="thumb">
      <img src="admin-area/product-image/<?php echo $product_img1; ?>" class="img-responsive">
    </a>
  </div><!--col-xs-4 finish -->
  <div class="col-xs-4"><!--col-xs-4 begin -->
    <a  data-target="#myCarousel" data-slide-to="1"href="#" class="thumb">
      <img src="admin-area/product-image/<?php echo $product_img2; ?>" class="img-responsive">
    </a>
  </div><!--col-xs-4 finish -->
  <div class="col-xs-4"><!--col-xs-4 begin -->
    <a  data-target="#myCarousel" data-slide-to="2"href="#" class="thumb">
      <img src="admin-area/product-image/<?php echo $product_img3; ?>" class="img-responsive">
    </a>
  </div><!--col-xs-4 finish -->
</div><!--#thumbs finish -->

</div><!--col-sm-6 finish -->
</div><!--row #productmain finish -->
<div class="box" id="details"><!-- #details begin -->
  <h4>Product Details</h4>
<p>
<?php echo $product_desc; ?></p>
<h4>Size</h4>
<ul>
  <li>Small</li>
  <li>Medium</li>
  <li>Large</li>
</ul>
  <hr>
</div><!-- #details finish -->
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
  <a href="details.php?pro_id=<?php echo $row_product['product_id']; ?>">
    <img src="admin-area/product-image/<?php echo $row_product['product_img1']; ?>" class="img-responsive">
  </a>
  <div class="text">
    <h3><a href="<?php echo $row_product['product_id']; ?>"> <?php echo $row_product['product_title']; ?></a></h3>
    <p class="price"><?php echo $row_product['product_price']; ?></p>
  </div>
  </div><!--product same-height finish -->
  </div><!--col-md-3 col-sm-6 center-responsive finish -->


<?php } ?>



</div><!-- #row same-height-row finish -->

</div><!--col-md-9 finish -->
</div><!--container finish -->
</div><!--#content finish -->
<?php
include("includes/footer.php")
?>

  <script src="js/script.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  <!-- <script src="js/fontawesome.min.js"></script> -->
  </body>
</html>
