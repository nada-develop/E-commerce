<?php
// include("includes/db.php");
// include("functions/functions.php");
$active='Shop';
include("includes/header.php");

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
    <?php
    if(!isset($_GET['p_cat'])){
      if (!isset($_GET['cat'])) {
    echo"
  <div class='box'><!--box begin -->
    <h1> Shop</h1>
    <p>jkjkjbkjkjkjhkkkkkkkkkkkkkbbbbbbbbbbbbbbbbbbkkkkjggggggggggg
    cgggggggggggggggggggggggggjjjjjjjgkuhliup9upiuppppppppppppp</p>
  </div> <!--box finish -->
  ";
}
}
  ?>
  <div class="row">
    <?php
    if(!isset($_GET['p_cat'])){
      if (!isset($_GET['cat'])) {
        // عدد صفحات الموقع وقابل للزياده والنقصان
        $per_page = 6;
        // page المقصود بيها صفحة الشوب
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
          }
      $start_from = ($page-1) * $per_page;
        $get_products = "SELECT * FROM products order by 1 DESC LIMIT $start_from,$per_page";
        $run_products = mysqli_query($conn,$get_products);
            while($row_products = mysqli_fetch_array($run_products)) {?>
              <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center-responsive begin -->
                <div class="product"><!--product begin -->
                  <a href="details.php?pro_id=<?php echo $row_products['product_id'];?>">
                   <img  class="img-responsive" src="admin-area/product-image/<?php echo $row_products['product_img1'];?>" alt="" style="width:1100px;height:270px;">
                  </a>
                  <div class="text">
                    <h3>
                       <a href="details.php?pro_id=<?php echo $row_products['product_id'];?>"><?php echo $row_products['product_title'];?></a>
                    </h3>
                    <p class="price"><?php echo $row_products['product_price'];?></p>
                    <p class="button">
                 <a href="details.php?pro_id=<?php echo $row_products['product_id'];?>" class="btn btn-default">View Details</a>
                 <a href="details.php?pro_id=<?php echo $row_products['product_id'];?>" class="btn btn-primary">
                  <i class="fa fa-shopping-cart">
                  Add To Cart</i>
                  </a>
                    </p>
                  </div>
                </div><!--product end -->
              </div><!--col-md-4 col-sm-6 center-responsive finish -->
      <?php

        }
      ?>
  </div><!--row finish-->
  <center>
    <ul class="pagination"><!--pagination begin-->
      <?php
      $query = "SELECT * FROM products";
      $result = mysqli_query($conn,$query);
      $total_records = mysqli_num_rows($result);
      $total_pages = ceil($total_records / $per_page);
         echo "
         <li>
         <a href='shop.php?page=1'>".'first page'."</a>
        </li>
         ";
         for ($i=1; $i<=$total_pages  ; $i++) {
           echo "
          <li>
           <a href='shop.php?page=".$i."'>".$i."</a>
          </li>
           ";
         };
         echo "
        <li>
         <a href='shop.php?page=$total_pages'>".'last page'."</a>
        </li>
         ";
    }
  }
       ?>
    </ul><!--pagination finish-->
  </center>
<?php
getpcatpro();
get_cat();
 ?>
</div><!--col-md-9 finish -->
</div><!--container finish -->
</div><!--#content finish -->

<?php include("includes/footer.php") ?>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  <!-- <script src="js/fontawesome.min.js"></script> -->
  </body>
</html>
